<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\URL;

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
    VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
        return (new MailMessage)
            ->subject('Verify Your Email Address')
            ->line('Click the button below to verify your email address.')
            ->line('If you did not create an account, no further action is required.')
            ->line('<img src="' . asset('pblogo.png') . '" alt="PB Logo" style="width: 150px;">') // Add logo here
            ->action('Verify Email Address', $url)
            ->salutation('Best regards, <br> Dop AS2 Maryam');
    });
}
}
