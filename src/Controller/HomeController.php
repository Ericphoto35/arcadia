<?php

namespace App\Controller;

use App\Entity\Animals;
use App\Entity\AvisVisiteurs;
use App\Entity\Habitats;
use App\Entity\HorairesZoo;
use App\Entity\Services;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'Accueil')]
    public function index(EntityManagerInterface $EntityManager): Response
    {
        $habitat = $EntityManager->getRepository(Habitats::class)->findAll();
        $service = $EntityManager->getRepository(Services::class)->findAll();
        $animal = $EntityManager->getRepository(Animals::class)->findAll();
        $avisvisiteur = $EntityManager->getRepository(AvisVisiteurs::class)->findAll();
        $horairezoo = $EntityManager->getRepository(HorairesZoo::class)->findOneById(1);
        return $this->render('home/index.html.twig', [
            'services' => $service,
            'habitats' => $habitat,
            'animals'=>$animal,
            'horairezoos'=>$horairezoo,
            'avisvisiteurs'=>$avisvisiteur,
        ]);
    }
}
