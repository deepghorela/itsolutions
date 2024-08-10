<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\RequestQuote;

class RequestQuoteMail extends Mailable
{
    use Queueable, SerializesModels;

    public $quote;

    /**
     * The name of the theme that should be used when formatting the message.
     *
     * @var string
     */
    public $theme = 'itsolutions';

    /**
     * Create a new message instance.
     */
    public function __construct(RequestQuote $quote)
    {
        $this->quote = $quote;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Enquiry for '.$this->quote->request_type.' received at '.date("d-m-Y, h:i:sA"),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown:'emails.request_quote',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
