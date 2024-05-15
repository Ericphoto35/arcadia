<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use MongoDB\Client as MongoClient;

class VueanimalAdminController extends AbstractController
{
    private function getViewCounts(): array
    {
        $mongoClient = new MongoClient('mongodb://localhost:27017');
        $viewCounts = [];
        $collections = [];

        $potentialCollections = ['view_cococounter', 'view_celicounter', /* Add more as needed */];
        foreach ($potentialCollections as $collectionName) {
            $db = $mongoClient->$collectionName;

            $found = false; // Flag to indicate if "page_views" collection is found
            $collectionsList = $db->listCollections();
            foreach ($collectionsList as $collection) {
                if ($collection->getName() === 'page_views') {
                    $found = true;
                    $collections[] = $db->page_views;
                    break;
                }
            }

            if (!$found) {
                // Handle case where "page_views" collection not found (optional)
                // echo "Collection '$collectionName.page_views' not found";
            }
        }

        if (!empty($collections)) {
            // ... rest of the code for aggregation and data processing
        }

        return $viewCounts;
    }

    // ... rest of the controller methods


    #[Route('/vues', name: 'app_vues')]
    public function index(): Response
    {
        $viewCounts = $this->getViewCounts();

        return $this->render('vueanimal_admin/index.html.twig', [
            'viewCounts' => $viewCounts,
        ]);
    }
}
