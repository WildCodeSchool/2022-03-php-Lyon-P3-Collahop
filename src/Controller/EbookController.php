<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\EbookType;
use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EbookController extends AbstractController
{
    #[Route('/get_ebook', name: 'ebook_form', methods: ['GET', 'POST'])]
    public function new(Request $request, ContactRepository $contactRepository): Response
    {
        $contact = new Contact();
        $form = $this->createForm(EbookType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contactRepository->add($contact, true);

            return $this->redirectToRoute('app_home');
        }

        return $this->renderForm('/ebook/index.html.twig', [
            'form' => $form,
            'contact' => $contact,
        ]);
    }
}
