<?php

namespace App\Controller;

use App\Entity\Animals;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use MongoDB\Client as MongoClient;

class VueAnimal1Controller extends AbstractController
{
    #[Route('/Hector', name: 'app_hector')]
    public function index(EntityManagerInterface $EntityManager): Response
    {

        $animal = $EntityManager->getRepository(Animals::class)->findOneBy(['prenomani' => 'Hector']);
        $mongoClient = new MongoClient('mongodb://Eric974:Biloute974#@lon5-c12-2.mongo.objectrocket.com:43741,lon5-c12-1.mongo.objectrocket.com:43741,lon5-c12-0.mongo.objectrocket.com:43741/Arcadia?replicaSet=dea02bd29b77453680af2162ec6f8654');
        $db = $mongoClient->view_hectorcounter;
        $collection = $db->page_views;

        $pageId = 'app_hector'; // Replace with your actual page ID

        $filter = ['app_hector' => $pageId];
        $viewCount = $collection->findOne($filter, ['projection' => ['view_count' => 1]]); // Get only view_count

        if ($viewCount) {
            $viewCount = $viewCount['view_count']; // Extract view count from document
        } else {
            $viewCount = 0; // Set to 0 if document not found
        }

        $update = ['$inc' => ['view_count' => 1]];
        $options = ['upsert' => true];

        $updateResult = $collection->updateOne($filter, $update, $options);

        return $this->render('vue_animal/animal1.html.twig', [
            'animals' => $animal,
            'viewCount' => $viewCount, // Pass retrieved view count
        ]);
    }
}
