<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactsType;
use App\Repository\ContactRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactsController extends AbstractController
{
    #[Route('/contacts', name: 'app_contacts')]
    public function new(Request $request, ContactRepository $contactRepository): Response
    {
        $contacts = new Contact();

        $form = $this->createForm(ContactsType::class, $contacts);

        return $this->renderForm('contacts/index.html.twig', [
            'form' => $form,
            'contacts' => $contacts
        ]);
    }
}
