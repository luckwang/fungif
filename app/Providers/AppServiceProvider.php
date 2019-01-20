<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
	{
		\App\Models\User::observe(\App\Observers\UserObserver::class);
		\App\Models\Tag::observe(\App\Observers\TagObserver::class);
		\App\Models\Reply::observe(\App\Observers\ReplyObserver::class);
		\App\Models\Gif::observe(\App\Observers\GifObserver::class);

        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (config('app.debug') == true) {
            $this->app->register(\VIACreative\SudoSu\ServiceProvider::class);
        };
        if (app()->environment() == 'local' || app()->environment() == 'testing') {
            $this->app->register(\Summerblue\Generator\GeneratorsServiceProvider::class);
        };
    }
}
