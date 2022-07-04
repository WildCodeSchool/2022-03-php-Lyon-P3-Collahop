<?php

namespace App\Controller;

use App\Repository\ContactRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route(path: '/admin', name: 'admin_')]
class AdminController extends AbstractController
{
    #[Route(path: "/", name: "dashboard")]
    public function list(): Response
    {
        return $this->render('admin/dashboard.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    #[Route(path: "/contacts", name: "contacts")]
    public function contacts(ContactRepository $contactRepository): Response
    {
        $contacts = $contactRepository->findAll();

/*         $contactsSubscribed = $contactRepository->findBy(['newsletter_subscribe' => $newsletter_subscribe]); */

        return $this->render('/admin/contacts.html.twig', [
            'contacts' => $contacts,
/*             'contactsSubscribed' => $contactsSubscribed, */
        ]);
    }
}
