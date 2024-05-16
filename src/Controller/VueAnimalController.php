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
        $animal = $EntityManager->getRepository(Animals::class)->findOneBy(['prenomani' => 'Loulou']);

        return $this->render('vue_animal/indexanimal.html.twig', [
            'animals' => $animal,
            
        ]);
    }
}
