<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarouselController extends AbstractController
{
    #[Route('/carousel', name: 'app_carousel')]
    public function index(): Response
    {
        return $this->render('carousel/index.html.twig', [
            'controller_name' => 'CarouselController',
        ]);
    }
}
