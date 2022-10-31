<?php

namespace goodcom\gc-order-printer;

use Illuminate\Support\ServiceProvider;
use goodcom\gc-order-printer\Controllers\GcOrderController;

class GcProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('goodcom\gc-order-printer\Controllers\GcOrderController');
		$this->app->make('goodcom\gc-order-printer\Controllers\GcPrinterController');
		$this->loadViewsFrom(__DIR__.'/views','goodcom');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/Routes/router.php');
		$this->publishes([__DIR__.'/config/gcprinter.php'=> config_path('gcprinter.php'),
		],'config');
		$this->loadMigrationsFrom(__DIR__ . '/Database/Migrations');
    }
}
