<?php

namespace App\Controller;

use App\Entity\Animals;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\SecurityBundle\Security as SecurityBundleSecurity;
use Doctrine\ODM\MongoDB\DocumentManager;
use App\Document\DocAnimal1;

class VueAnimal1Controller extends AbstractController
{
    private $security;

    public function __construct(SecurityBundleSecurity $security)
    {
        $this->security = $security;
    }

    #[Route('/Hector', name: 'app_hector')]
    public function index(EntityManagerInterface $EntityManager,DocumentManager $dm ): Response
    {
        $pageViewRepository = $dm->getRepository(DocAnimal1::class);
        $pageView = $pageViewRepository->findOneBy(['page' => 'hector']);
        if (!$pageView) {
            $pageView = new DocAnimal1();
            $pageView->setPage('hector');
        }
        $pageView->incrementViewCount();
        $dm->persist($pageView);
        $dm->flush();

        $animal = $EntityManager->getRepository(Animals::class)->findOneBy(['prenomani' => 'hector']);

        return $this->render('vue_animal/animal1.html.twig', [
            'animals' => $animal,
            'viewHectorCount' => $pageView->getViewCount(),
        ]);
    }
}

