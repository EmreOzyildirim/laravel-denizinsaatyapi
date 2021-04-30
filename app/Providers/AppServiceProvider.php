<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\properties;
use App\Models\categories;
use App\Models\agents;
use Illuminate\Support\Facades\View;


class AppServiceProvider extends ServiceProvider
{
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

        \Blade::directive('br',function(){
            return "<br />";
        });

        View::composer(['/admin/*'], function ($view) {

            $view->with('property_count', json_decode(properties::getPropertyCount(), true));
            $view->with('category_count', json_decode(categories::getCategoryCount(), true));
            $view->with('agent_count', json_decode(agents::getAgentCount(), true));

        });


    }
}
