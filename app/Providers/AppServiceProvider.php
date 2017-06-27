<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\State;
use Hashids\Hashids;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        if(!\App::runningInConsole()){
            view()->share('hashIds', new Hashids(env('APP_KEY'), 25, env('APP_CHAR')));
            view()->share('appName', 'TradeByBarter');
            view()->share('categories', Category::withCount(['items'])->get());
            view()->share('states', State::all());
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
