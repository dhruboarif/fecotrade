<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\User; 
use Config; 
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Paginator::useBootstrapFour();
        

        // $mailsetting =Mailsetting::first();
        // if($mailsetting){
        //     $data = [
        //     'driver'        => $mailsetting->mail_transport,
        //     'host'          => $mailsetting->mail_host, 
        //     'port'          => $mailsetting->mail_port,
        //     'encryption'    => $mailsetting-> mail_encryption,
        //     'username'      => $mailsetting->mail_username, 
        //     'password'      => $mailsetting->mail_password,
        //     'from'	        => 	[
        //         'address'   =>  $mailsetting->mail_from,
        //     	'name'      =>'infofecotrade']
        // ];
        // Config::set('mail', $data); 
        // }
    }
}
