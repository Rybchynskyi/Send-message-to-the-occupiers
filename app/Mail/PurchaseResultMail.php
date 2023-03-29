<?php

namespace App\Mail;

use App\Models\Purchase;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Attachment;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class PurchaseResultMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $purchase;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $user;
    public function __construct($purchase)
    {
        $this->purchase = Purchase::find($purchase);
//        $this->user = User::find(1);
        $this->user = User::find($this->purchase->user_id);
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Purchase Result',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'emails.purchase_result'
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [
            Attachment::fromPath('storage/' . $this->purchase->sertificate_img),
        ];
    }
}
