<?php

namespace MSACommon\MSACommon;

use Illuminate\Support\ServiceProvider;

class MSACommonServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'msacommon');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'msacommon');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/msacommon.php', 'msacommon');

        // Register the service the package provides.
        $this->app->singleton('msacommon', function ($app) {
            return new MSACommon;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['msacommon'];
    }
    
    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/msacommon.php' => config_path('msacommon.php'),
        ], 'msacommon.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/msacommon'),
        ], 'msacommon.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/msacommon'),
        ], 'msacommon.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/msacommon'),
        ], 'msacommon.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
