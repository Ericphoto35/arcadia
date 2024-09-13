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

class VueAnimalController extends AbstractController
{
    private $security;

    public function __construct(SecurityBundleSecurity $security)
    {
        $this->security = $security;
    }

    #[Route('/Loulou', name: 'app_loulou')]
    public function index(EntityManagerInterface $EntityManager,DocumentManager $dm ): Response
    {
        $pageViewRepository = $dm->getRepository(DocAnimal1::class);
        $pageView = $pageViewRepository->findOneBy(['page' => 'loulou']);
        if (!$pageView) {
            $pageView = new DocAnimal1();
            $pageView->setPage('loulou');
        }
        $pageView->incrementViewCount();
        $dm->persist($pageView);
        $dm->flush();

        $animal = $EntityManager->getRepository(Animals::class)->findOneBy(['prenomani' => 'loulou']);

        return $this->render('vue_animal/indexanimal.html.twig', [
            'animals' => $animal,
            'viewLouloucount' => $pageView->getViewCount(),
        ]);
    }
}
