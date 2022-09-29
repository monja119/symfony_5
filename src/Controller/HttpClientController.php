<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class HttpClientController extends AbstractController
{
    private $client;
    #[Route('/request', name: 'app_request')]
    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
        $this->getInfo();
    }

    public function getInfo():Response
    {
        $response = $this->client->request(
            'GET',
            'https://login.live.com/login.srf?wa=wsignin1.0&rpsnv=13&ct=1664437916&rver=7.3.6962.0&wp=MBI_SSL_SHARED&wreply=https:%2F%2Fonedrive.live.com%2Fedit.aspx%3Fresid%3D79794A7E0BB8B2B2!278%26ithint%3Dfile%252cdocx%26wdOrigin%3DOFFICECOM-WEB.START.MRU&lc=1036&id=250206&cbcxt=sky&cbcxt=sky',
            [
                'headers' => [
                    'Accept' => 'application/json',
                ],
            ]
        );
        $statusCode = $response->getStatusCode();
        $statusType = $response->getHeaders()['content-type'][0];
        $content = $response->getContent();
        return new Response("<h1> haha this is your content : </h1>".$statusCode."<br><code>".$content."</code>>");
    }
}
