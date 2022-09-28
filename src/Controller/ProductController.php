<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Product;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\RequestStack;

class ProductController extends AbstractController
{
    #[Route('/product', name: 'app_product')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $entintyManager = $doctrine->getManager();

        $product = new Product();
        $product->setName("ASUS");
        $product->setPrice(20000);
        $product->setDescription('C\'est un bon ordinateur à la fois');

        // wanting saving
        $entintyManager->persist($product);

        // exucuting query
        $entintyManager->flush();

        return new Response(
            'you saved a product : '.$product->getName().', '
            .$product->getPrice().'Ar ('.$product->getDescription().') ID : '.$product->getId()
        );
    }
    #[Route('/product/{id}', name: 'show_product')]
    public function show(ManagerRegistry $doctrine, int $id, RequestStack $requestStack): Response
    {
        $product = $doctrine->getRepository(Product::class)->find($id);

        if(!$product)
            return new Response(
                'No product found for '.$id
            );

        return new Response(
            'The result is : '.$product->getName().', '
            .$product->getPrice().'Ar ('.$product->getDescription().') ID : '.$product->getId().
            '<a href="http://localhost:8000/task"> Continuer</a>
            <br>
            <a href="http://localhost:8000/session"> See session</a>
            '
        );
    }
}
