<?php

namespace App\Controller;

use App\Entity\Message;
use PhpParser\Builder\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(): Response
    {
        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
        ]);
    }

    #[Route('/contact/new', name: 'app_contact')]
    public function new(Request $request): Response
    {

        // création d'un message vide
        $message = new Message();
        // ajout de valeurs par défaut 
        $message->setContent('Un message par défaut');

        // receptacle pour le retour utilisateur
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
        }

        // affichage de la page et donc du formulaire

        return $this->renderForm('contact/new.html.twig', [
            'contact_form' => $form,
            'sent_message' => $sentMessage
        ]);
    }

    
}
