<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//use Auth;
use App\Approval;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Contracts\View\Factory as ViewFactory;
//use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(ViewFactory $view)
    {
        //
        //dd('here');
        $view->composer('*', 'App\Http\ViewComposers\GlobalComposer');
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
