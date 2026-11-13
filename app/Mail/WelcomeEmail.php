<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use phpDocumentor\Reflection\PseudoTypes\PublicPropertiesOf;

class WelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $userName;
    public $userEmail;



    public function __construct($name, $email)
    {
        $this->userName = $name;
        $this->userEmail = $email;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'WelcomeBack to CoolFix',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.welcome',
        );
    }


    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
