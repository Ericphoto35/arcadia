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
    private function getViewCount(string $pageId): int
{
    $mongoClient = new MongoClient('mongodb://Ericdu974:Biloute974@lon5-c12-2.mongo.objectrocket.com:43741,lon5-c12-1.mongo.objectrocket.com:43741,lon5-c12-0.mongo.objectrocket.com:43741');
    $db = $mongoClient->view_cococounter;
    $collection = $db->page_views;

    $filter = ['app_coco' => $pageId];
    $result = $collection->findOne($filter);

    return $result ? $result['view_count'] : 0;
}


    #[Route('/vues', name: 'app_vues')]
    
    public function index(): Response
    {
        $pageId = 'app_coco'; // Replace with your actual page ID
        $viewCount = $this->getViewCount($pageId);

        return $this->render('vue_animal/animal4.html.twig', [
            'viewCount' => $viewCount,
        ]);
    }
}
