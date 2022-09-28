<?php
// src/Controller/TaskController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

class ShowController extends AbstractController
{
    #[Route('/show/task', name: 'show_task')]
    public function task(Request $request): Response
    {
        return new Response('Redirected');
    }

    #[Route('/translate', name: 'translate')]
    public function trad(TranslatorInterface $translator): Response
    {
        $translated = $translator->trans('Hello');
        return new Response($translated);
    }
}