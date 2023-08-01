<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;
use Illuminate\Auth\Notifications\VerifyEmail as VerifyEmailNotification;

class CustomVerifyEmail extends VerifyEmailNotification
{
    
    protected $userData;

   
    public function toMail($notifiable)
    {
    $verificationUrl = $this->verificationUrl($notifiable);
 
       return (new MailMessage)
            ->subject(Lang::get('Verify Email Address'))
            ->markdown('emails.verify_email', [
                'url' => $verificationUrl,
                'name' => $notifiable->name,
                'email' => $notifiable->email,
                'user_name' => $notifiable->user_name,
            ])
            ->line('Hello, ' . $notifiable->name . ',')
            ->line(Lang::get('Please click the button below to verify your email address.'))
            ->action(Lang::get('Verify Email Address'), $verificationUrl)
            ->line(Lang::get('If you did not create an account, no further action is required.'));
    }
    
    public function with($userData)
    {
        $this->userData = $userData;
        return $this;
    }
}

