<?php

namespace App\Providers;

use App\Jop;
use App\LevelExperience;
use App\Observers\ExperienceObserver;
use App\Observers\JopObserver;
use Illuminate\Support\ServiceProvider;

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
        //
        Jop::observe(JopObserver::class);
        LevelExperience::observe(ExperienceObserver::class);
    }
}
