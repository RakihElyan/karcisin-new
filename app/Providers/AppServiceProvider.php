<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL; // <-- Tambahkan baris ini di paling atas file

use Illuminate\Support\ServiceProvider;

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
    // Tambahkan logika ini:
    // Jika aplikasi sedang produksi atau URL mengandung ngrok/cloudflare, paksa HTTPS.
    if($this->app->environment('production') || env('APP_ENV') === 'local') {
        URL::forceScheme('https');
    }
    }
}
