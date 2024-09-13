<?php

namespace App\Controller;

use App\Document\DocAnimal1;
use App\Entity\Habitats;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class VuesdesAnimauxController extends AbstractController
{
    #[Route('/animals', name: 'app_animals')]
    public function index(EntityManagerInterface $entityManager, DocumentManager $dm): Response
    {
        $habitats = $entityManager->getRepository(Habitats::class)->findAll();

        // Préchargement des animaux pour chaque habitat
        foreach ($habitats as $habitat) {
            $entityManager->initializeObject($habitat);
            $habitat->getAnimals()->toArray(); // Force le chargement des animaux
        }

        $animalDocuments = [
            'loulou' => DocAnimal1::class,
            'celi' => DocAnimal1::class,
            'coco' => DocAnimal1::class,
            'coco2' => DocAnimal1::class,
            'hector' => DocAnimal1::class,
            'zaza' => DocAnimal1::class,
            'joseph' => DocAnimal1::class,
            'sophie' => DocAnimal1::class,
            'leo' => DocAnimal1::class, 
        ];

        $viewCounts = [];
        foreach ($animalDocuments as $animalName => $documentClass) {
            $repository = $dm->getRepository($documentClass);
            $pageView = $repository->findOneBy(['page' => $animalName]);
            $viewCounts[$animalName . 'Count'] = $pageView ? $pageView->getViewCount() : 0;
        }

        return $this->render('vuesdes_animaux/index.html.twig', [
            'habitats' => $habitats,
            'viewCounts' => $viewCounts,
        ]);
    }
}