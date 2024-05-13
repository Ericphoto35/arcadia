<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\SigninType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;

class SigninController extends AbstractController
{
    #[Route('/signin', name: 'app_signin')]
    public function index(Request $request,EntityManagerInterface $entitymanager,UserPasswordHasherInterface $passwordhasher): Response
    {
        $user = new User();

        $formsignin = $this->createForm(SigninType::class, $user);
        $formsignin -> handleRequest($request);

        if ($formsignin->isSubmitted() && $formsignin->isValid()) 
        {
            $user = $formsignin->getData();

            $plaintextPassword = $user->getPassword();
            $hasherpassword = $passwordhasher->hashPassword($user, $plaintextPassword);
            $user->setPassword($hasherpassword);

            $entitymanager->persist($user);
            $entitymanager->flush();
            return $this->redirectToRoute('Accueil');
        }
        return $this->render('signin/index.html.twig', [
            'formsignin' => $formsignin -> createView(),
        ]);
    }
}
