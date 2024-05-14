<?php

namespace App\Controller;

use App\Entity\AvisVisiteurs;
use App\Form\AvisType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AvisVisiteurController extends AbstractController
{
    #[Route('/avis', name: 'app_avis_visiteur')]
    public function add(Request $request, EntityManagerInterface $EntityManager,) : Response
    {
        $Avisvisiteur = new AvisVisiteurs();
        $form = $this->createForm(AvisType::class, $Avisvisiteur);
        $form -> handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $EntityManager->persist($Avisvisiteur);
            $EntityManager->flush();
            $this->addFlash('success', 'Avis enregistré avec succès !');
            return $this->redirectToRoute('Accueil');
        }
        return $this->render('home/avis.html.twig', [
            'form' => $form -> createView(),
        ]);
    }
}
