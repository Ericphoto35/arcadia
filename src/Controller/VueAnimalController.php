<?php

namespace App\Controller;

use App\Entity\Animals;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use MongoDB\Client as MongoClient;

class VueAnimalController extends AbstractController
{
    #[Route('/Loulou', name: 'app_loulou')]
    public function index(EntityManagerInterface $EntityManager): Response
    {

        $animal = $EntityManager->getRepository(Animals::class)->findOneBy(['prenomani' => 'loulou']);
        $mongoClient = new MongoClient('mongodb://localhost:27017');
        $db = $mongoClient->view_louloucounter;
        $collection = $db->page_views;

        $pageId = 'app_loulou'; // Replace with your actual page ID

        $filter = ['app_loulou' => $pageId];
        $update = ['$inc' => ['view_count' => 1]];
        $options = ['upsert' => true];

        $updateResult = $collection->updateOne($filter, $update, $options);
         if ($updateResult->getModifiedCount() === 1) {
            echo "View count for page $pageId incremented successfully.\n";
        } else {
            echo "View count for page $pageId could not be incremented.\n";
        }
        return $this->render('vue_animal/indexanimal.html.twig', [
            'animals' => $animal,
        ]);
    }
}
