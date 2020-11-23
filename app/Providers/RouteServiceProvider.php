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

        $this->mapWebRoutes();

        $this->mapSekolahRoutes();

        $this->mapDevRoutes();
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


    protected function mapSekolahRoutes()
    {
        Route::prefix('sekolah-auth')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/sekolah/auth.php'));

        Route::prefix('sekolah-dash')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/sekolah/dash.php'));
    
        Route::prefix('sekolah-master')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/sekolah/master.php'));
    
        Route::prefix('sekolah-trans')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/sekolah/trans.php'));
    
        Route::prefix('sekolah-report')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/sekolah/report.php'));
   
    }

    protected function mapDevRoutes()
    {
        Route::prefix('dev-auth')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/dev/auth.php'));

        Route::prefix('dev-dash')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/dev/dash.php'));
    
        Route::prefix('dev-master')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/dev/master.php'));
    
        Route::prefix('dev-trans')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/dev/trans.php'));
    
        Route::prefix('dev-report')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/dev/report.php'));
   
    }

}
