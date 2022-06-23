<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Exception;

class LoginController extends AbstractController
{
    #[Route('/login', name: 'login')]
    public function index(AuthenticationUtils $authenticationUtils): Response
    {
         // get the login error if there is one
         $error = $authenticationUtils->getLastAuthenticationError();

         // last username entered by the user
         $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('login/index.html.twig', [
             'last_username' => $lastUsername,
             'error'         => $error,
        ]);
    }

    #[Route('/logout', name: 'logout', methods: ['GET'])]
    public function logout(): void
    {
        throw new Exception('Don\'t forget to activate logout in security.yaml');
    }
}
