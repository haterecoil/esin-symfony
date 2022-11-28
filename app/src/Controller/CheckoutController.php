<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CheckoutController extends AbstractController
{
    #[Route('/checkout', name: 'app_checkout')]
    // Affiche le panier, permet d'entrer adresse et paiement
    public function index(): Response
    {
        return $this->render('checkout/index.html.twig', [
            'controller_name' => 'CheckoutController',
        ]);
    }

    #[Route('/checkout/new', name: 'app_checkout_create')]
    /**
     * Quand on l'appelle, elle crée un panier avec un ensemble d'articles
     * et le sauvegarde en base de données
     * Si possible, on ajoute l'identifiant de ce panier à la Session du visiteur
     * pour conserver en mémoire le panier actif
     */
    public function create(): Response
    {
        return $this->render('checkout/index.html.twig', [
            'controller_name' => 'CheckoutController',
        ]);
    }

    #[Route('/checkout/thank_you', name: 'app_checkout_thank_you')]
    // Confirmation de commande
    public function thankYou(): Response
    {
        return $this->render('checkout/index.html.twig', [
            'controller_name' => 'CheckoutController',
        ]);
    }

}
