<?php

// src/Controller/ProductController.php
namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use

Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class interfasy extends AbstractController
{
    #[Route('/products')]
    public function list(LoggerInterface $logger): Response
    {
        return new Response($logger->info('Look, I just used a service!'));

    // ...
    }
}