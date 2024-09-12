<?php

namespace App\Controller;
use App\Entity\Animals;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ODM\MongoDB\DocumentManager;
use App\Document\DocAnimal1;
use App\Document\PageView;

class VuesdesAnimauxController extends AbstractController
{
    #[Route('/vuesdesanimaux', name: 'app_vuesdes_animaux')]
    public function index(EntityManagerInterface $EntityManager,DocumentManager $dm ): Response
    {
        $pageViewRepository = $dm->getRepository(DocAnimal1::class);
        $pageView = $pageViewRepository->findOneBy(['page' => 'services']);
        $pageView1 = $dm->getRepository(PageView::class)->findOneBy(['page' => 'services']);
       
        

        $animal = $EntityManager->getRepository(Animals::class)->findOneBy(['prenomani' => 'loulou']);

        return $this->render('vuesdes_animaux/index.html.twig', [
            'animals' => $animal,
            'viewCount' => $pageView->getViewCount(),
            'viewCount1' => $pageView1->getViewCount(),
        ]);
    }
}
