<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactsType;
use App\Repository\ContactRepository;
use App\Service\FormManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactsController extends AbstractController
{
    #[Route('/contacts', name: 'app_contacts')]
    public function new(Request $request, ContactRepository $contactRepository, FormManager $formManager): Response
    {
        $contact = new Contact();
        $contact->setCreatedAt()->setMessage('');

        $form = $this->createForm(ContactsType::class, $contact);
        $form->handleRequest($request);

        $warning = '';
        $message = '';
        if ($form->isSubmitted()) {
            $data = $form->getData();
            if ($data instanceof Contact) {
                $message = $data->getMessage();
                if ($message) {
                    $warning = $formManager->incorrectMessage($message);
                }
                $email = $data->getEmail();
                if ($email) {
                    $contactExists = $contactRepository->findOneBy(['email' => $email]);
                    if ($contactExists) {
                        $contact = $contactExists;
                    }
                }
            }
        }

        if ($form->isSubmitted() && $form->isValid() && empty($warning)) {
            $contact->setMessage($message);
            $contactRepository->add($contact, true);

            $this->addFlash('success', 'Votre message a été envoyé avec succès !');

            return $this->redirectToRoute('app_home');
        }

        return $this->renderForm('contacts/index.html.twig', [
            'form' => $form,
            'contact' => $contact,
            'warning' => $warning,
        ]);
    }
}
