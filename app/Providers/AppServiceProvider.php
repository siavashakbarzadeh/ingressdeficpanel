<?php

namespace FleetCart\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;
use Jackiedo\DotenvEditor\DotenvEditorServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        dd("ok");
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();

        if (Request::secure()) {
            URL::forceScheme('https');
        }
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('path.public', function() {
            return base_path().'/public_html';
        });
        if (! config('app.installed')) {
            $this->app->register(DotenvEditorServiceProvider::class);
        }
    }
}
