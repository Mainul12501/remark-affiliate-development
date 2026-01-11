<?php

namespace App\Providers;

use App\Models\SiteSetting;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);

        View::composer('front.master', function ($view) {
            $view->with('siteSetting', SiteSetting::first());
        });

//        add tiktok
        Event::listen(function (\SocialiteProviders\Manager\SocialiteWasCalled $event) {
            $event->extendSocialite('tiktok', \SocialiteProviders\TikTok\Provider::class);
        });

//        add instagram
        Event::listen(function (\SocialiteProviders\Manager\SocialiteWasCalled $event) {
            $event->extendSocialite('instagram', \SocialiteProviders\Instagram\Provider::class);
        });
    }
}
