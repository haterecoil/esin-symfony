<?php

namespace App\Controller;

use App\Entity\Checkout;
use App\Entity\CheckoutProduct;
use App\Form\CheckoutCreateType;
use App\Repository\ProductRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CheckoutController extends AbstractController
{
    #[Route('/checkout', name: 'app_checkout')]
    public function index(): Response
    {
        return $this->render('checkout/index.html.twig', [
            'controller_name' => 'CheckoutController',
        ]);
    }

    #[Route('/checkout/create', name: 'app_checkout_create')]
    /**
     * Quand on l'appelle, elle crée un panier avec un ensemble d'articles
     * et le sauvegarde en base de données
     * Si possible, on ajoute l'identifiant de ce panier à la Session du visiteur
     * pour conserver en mémoire le panier actif
     */
    // @todo: tester
    public function create(Request $request, ManagerRegistry $doctrine, ProductRepository $productRepository): Response
    {
        // réceptacle pour le contenu de mon formulaire
        $checkoutCreationData = [];
    
        // création du formulaire, lien avec le réceptacle 
        $form = $this->createForm(CheckoutCreateType::class, $checkoutCreationData);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $checkoutCreationData = $form->getData();

            $entityManager = $doctrine->getManager();

            // creer checkout et checkout product

            $checkout = new Checkout();
            $checkout->setStatus('NEW');
            $entityManager->persist($checkout);

            $checkoutProduct = new CheckoutProduct();

            $product = $productRepository->find($checkoutCreationData['product_id']);
            $checkoutProduct->setCheckout($checkout);
            $checkoutProduct->setProduct($product);
            $checkoutProduct->setQuantity($checkoutCreationData['quantity']);

            $entityManager->persist($checkoutProduct);
            $entityManager->flush();

            return $this->redirectToRoute('app_checkout_read', ['id' => $checkout->getId()]);
        }

        return $this->render('checkout/index.html.twig', [
            'controller_name' => 'CheckoutController',
        ]);
    }


    #[Route('/checkout/{id}', name: 'app_checkout_read')]
    // Affiche le panier, permet d'entrer adresse et paiement
    public function read(Checkout $checkout): Response
    {
        // @todo: modifier le template pour afficher le checkout et un formulaire pour le modifier
        return $this->render('checkout/index.html.twig', [
            'controller_name' => 'CheckoutController',
            'checkout' => $checkout
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
