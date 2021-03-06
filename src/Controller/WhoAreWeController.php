<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WhoAreWeController extends AbstractController
{
    #[Route('/who_are_we', name: 'app_who_are_we')]
    public function index(): Response
    {
        return $this->render('who_are_we/carousel.html.twig');
    }
}
