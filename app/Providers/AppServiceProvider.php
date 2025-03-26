<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;

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
        RedirectIfAuthenticated::redirectUsing(function ($request) {
         
                // إذا كان المستخدم موثّق بواسطة guard المارشانت
                if (auth()->guard('merchant')->check()) {
                    return route('merchant.index');
                }
                // إذا كان المستخدم موثّق بواسطة guard الويب
                if (auth()->guard('web')->check()) {
                    return route('dashboard');
                }

                // إذا كان ضيف (guest) على صفحات المارشانت
                // return route('merchant.login');
            
            
          
        });
    }
}
