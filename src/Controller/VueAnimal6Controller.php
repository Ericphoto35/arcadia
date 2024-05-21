<?php

namespace App\Controller;

use App\Entity\Animals;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use MongoDB\Client as MongoClient;
use Symfony\Bundle\SecurityBundle\Security as SecurityBundleSecurity;
use Symfony\Component\Security\Core\Security;

class VueAnimal6Controller extends AbstractController
{
    private $security;

    public function __construct(SecurityBundleSecurity $security)
    {
        $this->security = $security;
    }

    #[Route('/Zazou', name: 'app_zazou')]
    public function index(EntityManagerInterface $EntityManager): Response
    {
        $animal = $EntityManager->getRepository(Animals::class)->findOneBy(['prenomani' => 'zazou']);
        $mongoClient = new MongoClient($_ENV['MONGODB_URL']);
        $db = $mongoClient->animal_counter;
        $collection = $db->page_zazouviews;

        $pageId = 'app_zazou'; // Replace with your actual page ID

        $filter = ['app_zazou' => $pageId];
        $viewzazouCount = $collection->findOne($filter, ['projection' => ['view_count' => 1]]); // Get only view_count

        if ($viewzazouCount) {
            $viewzazouCount = $viewzazouCount['view_count']; // Extract view count from document
        } else {
            $viewzazouCount = 0; // Set to 0 if document not found
        }

        // Check if user is admin
        $currentUser = $this->getUser();
        if (!$currentUser || !$this->isGranted('ROLE_ADMIN')) {
            $update = ['$inc' => ['view_count' => 1]];
            $options = ['upsert' => true];
            $updateResult = $collection->updateOne($filter, $update, $options);
        }

        return $this->render('vue_animal/animal6.html.twig', [
            'animals' => $animal,
            'viewzazouCount' => $viewzazouCount,
        ]);
    }
}

