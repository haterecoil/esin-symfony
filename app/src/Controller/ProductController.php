<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ProductController extends AbstractController
{
    #[Route('/product', name: 'app_product')]
    public function index(ProductRepository $productRepository): Response
    {
        $products = $productRepository->findAll();

        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
            'products' => $products
        ]);
    }

    #[Route('/product/create', name: 'app_product_create')]
    // @todo: modifier le template pour afficher un lien vers la page produit
    public function create(Request $request, ManagerRegistry $doctrine): Response
    {
        
        $entityManager = $doctrine->getManager();

        $product = new Product();

        $form = $this->createFormBuilder($product)
            ->add('name', TextType::class)
            ->add('price', NumberType::class)
            ->add('stock', IntegerType::class)
            ->add('description', TextareaType::class)
            ->add('imagelink', TextType::class)
            ->add('submit', SubmitType::class, ['label' => 'Envoyer le message'])
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $product = $form->getData();
            $entityManager->persist($product);
            $entityManager->flush();
        }

        return $this->render('product/create.html.twig', [
            'controller_name' => 'test',
            // ne pas oublier qu'il faut créer la "vue" du formulaire avant de l'envoyer à twig
            'form' => $form->createView() 
        ]);
    }

    #[Route('/product/{id}', name: 'app_product_read')]
    // @todo: modifier le template pour afficher le produit
    // @todo: modifier le template pour ajouter un formulaire de type CheckoutCreateType
    public function read(): Response
    {
        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }

    #[Route('/product/update', name: 'app_product_update')]
    public function update(): Response
    {
        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }

    #[Route('/product/delete', name: 'app_product_delete')]
    public function delete(): Response
    {
        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }

}
