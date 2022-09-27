<?php
// src/Controller/MailerController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class MailerController extends AbstractController
{
    /**
     * @throws TransportExceptionInterface
     */
    #[Route('/email')]
    public function sendEmail(MailerInterface $mailer): Response
    {
        $email = (new Email())
        ->from('monja.sesame@gmail.com')
        ->to('monja22.aps2a@gmail.com')
        ->cc('anicet22.aps2a@gmail.com')
        //->bcc('bcc@example.com')
        //->replyTo('fabien@example.com')
        //->priority(Email::PRIORITY_HIGH)
        ->subject('Test d\' envoi de message via le framework Symfony !')
        ->text('Ce message est just un test')
        ->html('<p>Sur ordre des Peaky Coders !</p>');

        return $mailer->send($email);

        // ...
    }
}