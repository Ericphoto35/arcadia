<?php

namespace App\Controller;

use App\Document\DocAnimal1;
use App\Entity\Animals;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\SecurityBundle\Security as SecurityBundleSecurity;
use Doctrine\ODM\MongoDB\DocumentManager;


class VueAnimal7Controller extends AbstractController
{
    private $security;

    public function __construct(SecurityBundleSecurity $security)
    {
        $this->security = $security;
    }

    #[Route('/sophie', name: 'app_sophie')]
    public function index(EntityManagerInterface $EntityManager,DocumentManager $dm ): Response
    {
        $pageViewRepository = $dm->getRepository(DocAnimal1::class);
        $pageView = $pageViewRepository->findOneBy(['page' => 'sophie']);
        if (!$pageView) {
            $pageView = new DocAnimal1();
            $pageView->setPage('sophie');
        }
        $pageView->incrementViewCount();
        $dm->persist($pageView);
        $dm->flush();

        $animal = $EntityManager->getRepository(Animals::class)->findOneBy(['prenomani' => 'sophie']);

        return $this->render('vue_animal/animal7.html.twig', [
            'animals' => $animal,
            'viewSophiecount' => $pageView->getViewCount(),
        ]);
    }
}

