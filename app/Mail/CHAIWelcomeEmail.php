<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CHAIWelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        $firstName,
        $lastName,
        $email,
        $defaultPassword,
        $roleName
    ) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->defaultPassword = $defaultPassword;
        $this->roleName = $roleName;
    }

    public function build()
    {
        return $this->view('emails.chai-welcome-email')
            ->subject('Welcome Email - NCCHF/NCCAP')
            ->with([
                'email' => $this->email,
                'firstName' => $this->firstName,
                'lastName' => $this->lastName,
                'defaultPassword' => $this->defaultPassword,
                'roleName' => $this->roleName,
                'login_url' => "https://ncchf.resilience.ng/login",
                'support_email' => "info@resilience.ng",
            ]);
    }
}
