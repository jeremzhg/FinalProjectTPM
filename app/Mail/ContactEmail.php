<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $subject;
    public $messageBody;

    /**
     * Create a new message instance.
     *
     * @param string $name
     * @param string $email
     * @param string $subject
     * @param string $message
     */
    public function __construct($name, $email, $subject, $message)
    {
        $this->name = $name;
        $this->email = $email;
        $this->subject = $subject;
        $this->messageBody = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.contact')
                    ->subject($this->subject)
                    ->with([
                        'name' => $this->name,
                        'email' => $this->email,
                        'messageBody' => $this->messageBody,
                    ]);
    }
}
