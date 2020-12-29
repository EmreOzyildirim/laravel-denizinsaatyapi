<?php

namespace denizinsaatyapi\MetaTag;

use Illuminate\Support\ServiceProvider;

class MetaTagsProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('denizinsaatyapi\MetaTag\MetaTagController');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        include __DIR__.'/routes.php';
    }
}
