<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CreatedReportNotificationMail extends Mailable
{
    use SerializesModels;

    public function __construct(private $name, private $title, private $published_at)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Report Created',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.created-report-notification',
            with: [
                'name' => $this->name,
                'title' => $this->title,
                'published_at' => $this->published_at
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
