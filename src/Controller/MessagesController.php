<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MessagesController extends AbstractController
{
    #[Route('admin/messages', name: 'app_messages')]
    public function index(): Response
    {
        return $this->render('admin/messages/index.html.twig', [
            'controller_name' => 'MessagesController',
        ]);
    }
}
