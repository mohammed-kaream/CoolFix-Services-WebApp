<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Mailer\Bridge\Brevo\Transport\BrevoApiTransport;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        if (app()->environment('production')) {
            URL::forceScheme('https');
        }

        Schema::defaultStringLength(191);

        // إعداد مبرّد Brevo المخصص بدون تكرار الدالة
        Mail::extend('brevo', function () {
            return new BrevoApiTransport(
                env('BREVO_API_KEY')
            );
        });
    }
}
