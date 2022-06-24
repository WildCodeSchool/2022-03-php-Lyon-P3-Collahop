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
        $contact = new Contact();
        $contact->setCreatedAt();

        $form = $this->createForm(ContactsType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contactRepository->add($contact, true);

            $this->addFlash('success', 'Votre message a été envoyé avec succès !');

            return $this->redirectToRoute('app_home');
        }

        return $this->renderForm('contacts/index.html.twig', [
            'form' => $form,
            'contact' => $contact
        ]);
    }
}
