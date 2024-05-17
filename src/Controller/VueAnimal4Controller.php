<?php

namespace App\Controller;

use App\Entity\Animals;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use MongoDB\Client as MongoClient;

class VueAnimal4Controller extends AbstractController
{
    #[Route('/Coco', name: 'app_coco')]
    public function index(EntityManagerInterface $EntityManager): Response
    {

        $animal = $EntityManager->getRepository(Animals::class)->findOneBy(['prenomani' => 'Coco']);
        $mongoClient = new MongoClient('mongodb://Ericdu974:Biloute974@lon5-c12-2.mongo.objectrocket.com:43741,lon5-c12-1.mongo.objectrocket.com:43741,lon5-c12-0.mongo.objectrocket.com:43741/Arcadia?replicaSet=dea02bd29b77453680af2162ec6f8654');
        $db = $mongoClient->view_cococounter;
        $collection = $db->page_views;

        $pageId = 'app_coco'; // Replace with your actual page ID

        $filter = ['app_coco' => $pageId];
        $update = ['$inc' => ['view_count' => 1]];
        $options = ['upsert' => true];

        $updateResult = $collection->updateOne($filter, $update, $options);
         if ($updateResult->getModifiedCount() === 1) {
            echo "View count for page $pageId incremented successfully.\n";
        } else {
            echo "View count for page $pageId could not be incremented.\n";
        }
        return $this->render('vue_animal/animal4.html.twig', [
            'animals' => $animal,
        ]);
    }
}
