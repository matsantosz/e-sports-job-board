<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use MercadoPago\MercadoPagoConfig;

class MercadoPagoServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $accessToken = config('services.mercado_pago.access_token');

        MercadoPagoConfig::setAccessToken($accessToken);
    }
}
