<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Repository\ContactRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MessagesController extends AbstractController
{
    #[Route('admin/messages', name: 'app_messages')]
    public function index(ContactRepository $contactRepository): Response
    {

        return $this->render('admin/messages/index.html.twig', [
            'messages' => $contactRepository->findBy([], ['id' => 'DESC'])
        ]);
    }

    #[Route('/admin/messages/delete/{id}', methods: ['GET', 'DELETE'], name: 'delete_messages')]
    public function delete(ManagerRegistry $doctrine, int $id): Response
    {
        $messageManager = $doctrine->getManager();
        $messageUserContact = $messageManager->getRepository(Contact::class)->find($id);

        if (!$messageUserContact) {
            throw $this->createNotFoundException(
                'No message found for this contact.'
            );
        }

        $messageUserContact->setMessage(null);
        $messageManager->flush();

        return $this->redirectToRoute('app_messages', [
            'id' => $messageUserContact->getId()
        ]);
    }

    #[Route('/admin/messages/show/{id}', methods: ['GET'], name: 'show_messages')]
    public function show(Contact $contact): Response
    {
        return $this->render('admin/messages/show.html.twig', [
            'message' => $contact->getMessage(),
        ]);
    }
}
