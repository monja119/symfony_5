<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Response;

class SsController
{
    public function session(): Response
    {
        $session = new Session();
        $session->set('prod_id', 45);

        return new Response($session->get('prod_id'));
    }
}