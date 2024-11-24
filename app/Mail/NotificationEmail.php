<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NotificationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $submission;

    /**
     * Create a new message instance.
     */
    public function __construct($submission)
    {
        $this->submission= $submission;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('polaris@gmail.com', 'Polaris'),
            subject: 'Your Submission Status Has Been Updated'
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
{
    return new Content(
        view: 'notification.notificationEmail',
        with: ['submission' => $this->submission]
    );
}

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        return [];
    }
}
