<?php

namespace AdminAuth\Boot;

require __DIR__.'/helper.php';

use Illuminate\Support\ServiceProvider;

class BootstrapServiceProvider extends ServiceProvider
{
    public function register()
    {
        $urlSegements = request()->segments();
        $adminRoute = config('adlara.admin_route');

        if (isset($urlSegements[0]) && ($urlSegements[0] == $adminRoute)) {

            $this->app->app_scope = 'admin';
            config(['adlara.app_scope' => 'admin']);
            view()->addLocation(resource_path('views/admin'));
            
        } else {
            
            $this->app->app_scope = 'front';
            view()->addLocation(resource_path('views/front'));

        }

    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/adlara.php' => config_path('adlara.php'),
            __DIR__.'/../config/auth.php' => config_path('auth.php'),
            __DIR__.'/../routes/admin.php' => base_path('routes/admin.php'),
            __DIR__.'/../views/admin/auth/login.blade.php' => base_path('resources/views/admin/auth/login.blade.php'),
            __DIR__.'/../views/admin/layouts/app.blade.php' => base_path('resources/views/admin/layouts/app.blade.php'),
            __DIR__.'/../views/admin/welcome.blade.php' => base_path('resources/views/admin/welcome.blade.php'),
            __DIR__.'/../database/migrations/' => database_path('/migrations'),
            __DIR__.'/../controllers/' => base_path('app/Http/Controllers'),
            __DIR__.'/../middleware/AdminUser.php' => base_path('app/Http/Middleware/AdminUser.php'),
            __DIR__.'/../objects/' => base_path('app/Objects'),
            __DIR__.'/../Providers/RouteServiceProvider.php' => base_path('app/Providers/RouteServiceProvider.php'),
            __DIR__.'/../providers/kernel.php' => base_path('app/Http/Kernel.php'),
            __DIR__.'/helper.php' => base_path('app/helper.php')
        ], 'adlaraadminauthfullsetup');
    }
}