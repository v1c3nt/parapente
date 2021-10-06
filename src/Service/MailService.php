<?php

namespace App\Service;

use Symfony\Component\Mime\Email;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;

class MailService
{
    private $mailer;
    private $addressMail;

    public function __construct(MailerInterface $mailer, string $addressMail)
    {
        $this->mailer = $mailer;
        $this->addressMail = $addressMail;
    }

    public function newQuestion(string $sender, string $message, bool $copy)
    {
        $context = ['message' => $message];
        $email = (new TemplatedEmail())
            ->from($sender)
            ->to($this->addressMail)
            ->subject('J\'ai une question !')
            ->htmlTemplate('emails/post.html.twig')
            ->context($context);
            $this->mailer->send($email);
            
            if ( $copy ){
                $context['copy'] = [ $copy];
                $email
                ->to($sender)
                ->context($context);
                $this->mailer->send($email);
            }
    }
}
