<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OurServicesController extends AbstractController
{
    #[Route('/our/services', name: 'app_our_services')]
    public function index(): Response
    {
        return $this->render('our_services/index.html.twig', [
            'controller_name' => 'OurServicesController',
        ]);
    }
}
