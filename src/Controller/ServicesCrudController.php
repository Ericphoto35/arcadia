<?php

namespace App\Controller;

use App\Entity\Services;
use App\Repository\ServicesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

#[Route('/api/services', name: 'api_services_crud_')]
class ServicesCrudController extends AbstractController
{
    public function __construct(
        private EntityManagerInterface $manager,
        private ServicesRepository $repository,
        private SerializerInterface $serializer,
        
    ) {
    }

    #[Route('/new', name:'new', methods: 'POST')]
    public function new(): Response
    { 
        $services = new Services();
        $services->setServicenom('Service 1');
        $services->setServicedescription('Description of service 1');
        $services->setServiceimage('Image of service 1');
        return new JsonResponse ([
            ('The form to create a new service {$services->getId()}'),
            Response::HTTP_CREATED,
        ]);
    }

    #[Route('/{id}', name: 'show', methods: 'GET')]
    public function show(int $id,EntityManagerInterface $entityManager,): Response
    {
        $services = $entityManager->getRepository(Services::class)->findOneBy(['id' => $id]);
        if ($services) {
            $responseData= $this->serializer->serialize($services, 'json');
            return new JsonResponse($responseData, Response::HTTP_OK, [], true);
        }
        return new JsonResponse(null, Response::HTTP_NOT_FOUND);
    } 

    #[Route('/', name: 'edit', methods: 'PUT')]
    public function edit(int $id): Response
    {
        return new Response(sprintf('The form to edit a service with the id %s', $id));
    }

    #[Route('/', name: 'delete', methods: 'DELETE')]
    public function delete(int $id): Response
    {
        return new Response(sprintf('The form to delete a service with the id %s', $id));
    }

    

    public function index(): JsonResponse
    {
        return new JsonResponse([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/ServicesCrudController.php',
        ]);
    }   
}
