<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactInquiryMail extends Mailable
{
    use Queueable, SerializesModels;

    public $formData; // data here

    public function __construct($formData)
    {
        $this->formData = $formData;
    }

    public function build()
    {
        return $this->subject('New Contact Inquiry: ' . ($this->formData['subject'] ?? 'No Subject'))
              ->view('emails.contact-inquiry'); // Email design file
    }
}
