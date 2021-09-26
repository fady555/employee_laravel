<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';
    protected $namespace_applicant = 'App\Http\Controllers\ControllerApplicant';
    protected $namespace_hr        = 'App\Http\Controllers\ControllerHr';
    protected $namespace_api_hr        = 'App\Http\Controllers\ControllerApiHr';
    protected $namespace_accountant    = 'App\Http\Controllers\ControllerAccountant';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/home';


    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();
        $this->mapApiRoutesHr();


        $this->mapWebRoutes();
        $this->mapWebRoutesApplicant();
        $this->mapWebRoutesHr();
        $this->mapWebRoutesAccountant();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    protected function mapWebRoutesApplicant()
    {
        Route::middleware('web')
             ->namespace($this->namespace_applicant)
             ->group(base_path('routes_for_applicant/web.php'));
    }



    protected function mapWebRoutesHr()
    {
        Route::middleware('web')
             ->namespace($this->namespace_hr)
             ->group(base_path('routes_for_hr/web.php'));
    }

    protected function mapWebRoutesAccountant()
    {
        Route::middleware('web')
             ->namespace($this->namespace_accountant)
             ->group(base_path('routes_for_accountant/web.php'));
    }


    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }

    protected function mapApiRoutesHr()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace_api_hr)
            ->group(base_path('routes_for_hr/api.php'));
    }
}
