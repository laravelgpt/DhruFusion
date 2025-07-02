<?php

namespace laravelgpt\DhruFusion;

use Illuminate\Support\ServiceProvider;

class DhruServiceProvider extends ServiceProvider
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
        if ($this->app->runningInConsole()) {
            $this->commands([
                \laravelgpt\DhruFusion\Console\InstallDhruFusion::class,
            ]);
        }
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        $router = $this->app['router'];
        $router->aliasMiddleware('dhru.auth', \laravelgpt\DhruFusion\Http\Middleware\DhruAuth::class);
        $this->publishes([
            __DIR__ . '/dhru/index.php' => 'public/api/index.php',
            __DIR__ . '/Http/Controllers/DhruController.php' => 'Dhru/Controllers/DhruController.php',
            __DIR__ . '/Models' => 'Dhru/Models',
            // __DIR__ . '/Http/Controllers/DhruController.php' => app_path('Http/Controllers/Dhru/DhruController.php'),
            // __DIR__ . '/Models' => app_path('Models/Dhru'),
        ], 'dhru-fusion');
    }
}

