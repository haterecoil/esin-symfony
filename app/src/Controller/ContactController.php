<?php

namespace App\Controller;

use App\Entity\Message;
use App\Repository\MessageRepository;
use PhpParser\Builder\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(MessageRepository $messageRepository): Response
    {

        $messages = $messageRepository->findAll();

        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
            'messages' => $messages,
        ]);
    }

    #[Route('/contact/new', name: 'app_contact_new')]
    public function new(Request $request, ManagerRegistry $doctrine): Response
    {

        $entityManager = $doctrine->getManager();

        // création d'un message vide
        $message = new Message();
        // ajout de valeurs par défaut 
        $message->setContent('Un message par défaut');

        // receptacle pour le retour utilisateur
        /* @var ?Message $sentMessage */
        $sentMessage = null;

        // créer un formulaire 

        $form = $this->createFormBuilder($message)
            ->add('content', TextType::class)
            ->add('submit', SubmitType::class, ['label' => 'Envoyer le message'])
            ->getForm();

        // traitement du formulaire

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $sentMessage = $form->getData();
            $sentMessage->setCreatedAt(new \DateTimeImmutable("now"));
            $entityManager->persist($sentMessage);
            $entityManager->flush();
        }

        // affichage de la page et donc du formulaire

        return $this->renderForm('contact/new.html.twig', [
            'contact_form' => $form,
            'sent_message' => $sentMessage
        ]);
    }

    // nouvelle route contact 
    #[Route('/contact/{id}', name: 'app_contact_detail')]
    public function detail(Message $message) {
        return $this->render('contact/detail.html.twig', [
            'controller_name' => 'ContactController',
            'message' => $message
        ]);
    }
    
}
