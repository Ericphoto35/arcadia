<?php

namespace App\Controller;

use App\Entity\Services;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ODM\MongoDB\DocumentManager;
use App\Document\PageView;


class ServicesController extends AbstractController
{
    #[Route('/services', name: 'app_services')]
    public function index(EntityManagerInterface $EntityManager, DocumentManager $dm): Response    
    {
        $service = $EntityManager->getRepository(Services::class)->findAll();
        return $this->render('home/services.html.twig', [
            'services' => $service,
        ]);
    }
    
}
