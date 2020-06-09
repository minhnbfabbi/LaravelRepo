<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AdditionalServiceProvider extends ServiceProvider
{
    public $bindings = [
        \App\Services\Notification\INotificationService::class => \App\Services\Notification\FcmService::class
    ];
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
