<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route(path: '/admin', name: 'admin_')]
class AdminController extends AbstractController
{
    #[Route(path: "/", name: "login")]
    public function login(): Response
    {
        return $this->render('admin/login.html.twig');
    }

    #[Route(path: "/dashboard", name: "dashboard")]
    public function list(): Response
    {
        return $this->render(('admin/dashboard.html.twig'));
    }
}
