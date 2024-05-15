<?php

namespace App\Controller;

use App\Entity\Animals;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use MongoDB\Client as MongoClient;

class VueAnimal7Controller extends AbstractController
{
    #[Route('/sophie', name: 'app_sophie')]
    public function index(EntityManagerInterface $EntityManager): Response
    {

        $animal = $EntityManager->getRepository(Animals::class)->findOneBy(['prenomani' => 'sophie']);
        $mongoClient = new MongoClient('mongodb://localhost:27017');
        $db = $mongoClient->view_sophiecounter;
        $collection = $db->page_views;

        $pageId = 'app_sophie'; // Replace with your actual page ID

        $filter = ['app_sophie' => $pageId];
        $viewCount = $collection->findOne($filter, ['projection' => ['view_count' => 1]]); // Get only view_count

        if ($viewCount) {
            $viewCount = $viewCount['view_count']; // Extract view count from document
        } else {
            $viewCount = 0; // Set to 0 if document not found
        }

        $update = ['$inc' => ['view_count' => 1]];
        $options = ['upsert' => true];

        $updateResult = $collection->updateOne($filter, $update, $options);

        return $this->render('vue_animal/indexanimal.html.twig', [
            'animals' => $animal,
            'viewCount' => $viewCount, // Pass retrieved view count
        ]);
    }
}
