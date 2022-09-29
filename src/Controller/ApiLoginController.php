<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class ApiLoginController extends AbstractController
{
    #[Route('/api/login', name: 'app_api_login')]
    public function index(#[CurrentUser] ?User $user): JsonResponse
    {
    if (null === $user) {
        return $this->json([
            'message' => 'missing credentials',
            ], Response::HTTP_UNAUTHORIZED);
      }

    $token = ''; // somehow create an API token for $user

    return $this->json([
      'message' => 'Welcome to your new controller!',
      'path' => 'src/Controller/ApiLoginController.php',
      'user'  => $user->getUserIdentifier(),
      'token' => $token,
    ]);
    }
}
