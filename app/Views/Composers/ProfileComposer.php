<?php

namespace App\Views\Composers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class ProfileComposer
{
    protected $current_user;

    public function __construct()
    {
        $this->current_user = Auth::user();
    }

    public function compose(View $view)
    {
        $view->with('current_user', $this->current_user);
    }
}

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        view()->composer('*', ProfileComposer::class);
    }
}