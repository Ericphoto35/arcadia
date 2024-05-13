<?php

namespace App\Controller;

use App\Entity\Animals;
use App\Entity\Habitats;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HabitatsController extends AbstractController
{
    #[Route('/habitats', name: 'app_habitat')]
    public function index(EntityManagerInterface $EntityManager): Response    
    {
        $habitat = $EntityManager->getRepository(Habitats::class)->findAll();
        $animal = $EntityManager->getRepository(Animals::class)->findAll();
        return $this->render('home/habitats.html.twig', [
            'habitats' => $habitat,
            'animals' => $animal,

        ]);
    }
}