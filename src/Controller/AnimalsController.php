<?php

namespace App\Controller;

use App\Entity\Animals;
use App\Entity\Habitats;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AnimalsController extends AbstractController
{
    #[Route('/animals', name: 'app_animals')]
    public function index(EntityManagerInterface $EntityManager): Response    
    {
        $habitat = $EntityManager->getRepository(Habitats::class)->findAll();
        $animal = $EntityManager->getRepository(Animals::class)->findAll();
        return $this->render('home/animals.html.twig', [
            'habitats' => $habitat,
            'animals' => $animal,
        ]);
    }
}