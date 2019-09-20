<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\View;

class CommentsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->unreadCommenstCount();
    }

    public function unreadCommenstCount()
    {
        View::composer('layouts.admin', function($view){
            $view->with('unreadCommenstCount', \App\Models\Comment::where('proven', 0)->count());
        });
    }
}
