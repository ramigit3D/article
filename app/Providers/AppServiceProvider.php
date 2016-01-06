<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use \Sentinel;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $role = Sentinel::findRoleById(1);
        
        $role->permissions = [
        'admin' => true,
        
        ];
        
        $role->save();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
