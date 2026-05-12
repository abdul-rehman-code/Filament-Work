<?php

namespace App\Providers;

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
        \Illuminate\Support\Facades\View::composer('*', function ($view) {
            $menus = \App\Models\Menu::with(['subMenus' => function($query) {
                $query->where('is_active', true)->orderBy('order');
            }])
            ->where('location', 'header')
            ->where('is_active', true)
            ->orderBy('order')
            ->get();

            $footerMenus = \App\Models\Menu::where('location', 'footer')
            ->where('is_active', true)
            ->orderBy('order')
            ->get();

            $view->with('menus', $menus);
            $view->with('footerMenus', $footerMenus);
            $view->with('calculatorsMenu', $menus->firstWhere('title', 'Calculators'));
        });
    }
}
