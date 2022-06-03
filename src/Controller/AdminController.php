<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    #[Route(path:"admin", name:"admin")]
    public function login(): Response
    {
        return $this->render('admin/login.html.twig');
    }

    #[Route(path:"admin/index", name: "admin_index")]
    public function list(): Response
    {
        return $this->render(('admin/dashboard.html.twig'));
    }
}