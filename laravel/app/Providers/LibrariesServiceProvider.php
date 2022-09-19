<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class LibrariesServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        \App\DebugClass::clog('LibrariesServiceProvider register');
        \App\DebugClass::clog(\App\Libraries\Utilities\CurlExe::class);
        \App\DebugClass::clog(\App\Libraries\YoutubeChannel\YoutubeChannelPatrol::class);
        $this->app->singleton('curlExe', \App\Libraries\Utilities\CurlExe::class);
        $this->app->singleton('youtubeChannel\youtubeChannelPatrol', \App\Libraries\YoutubeChannel\YoutubeChannelPatrol::class);
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
