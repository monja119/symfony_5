<?php
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Component\HttpClient\Response;

class TranslatorController
{
    public function index(TranslatorInterface $translator) : Response
    {
        $translated = $translator->trans('Symfony is great');
        return new Response($translated);
        // ...
    }
}
