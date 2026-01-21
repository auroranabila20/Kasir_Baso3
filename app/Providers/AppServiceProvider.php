<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        View::share('routes', [

            [
                'label' => 'Dashboard',
                'route_name' => 'dashboard',
                'route_active' => 'dashboard',
                'icon' => 'fas fa-tachometer-alt',
                'is_dropdown' => false,
            ],

            [
                'label' => 'Kasir',
                'route_name' => 'kasir',
                'route_active' => 'kasir',
                'icon' => 'fas fa-cash-register',
                'is_dropdown' => false,
            ],

            [
                'label' => 'Transaksi',
                'route_name' => 'transaksi.index',
                'route_active' => 'transaksi.*',
                'icon' => 'fas fa-receipt',
                'is_dropdown' => false,
            ],

            [
                'label' => 'Master Data',
                'icon' => 'fas fa-database',
                'route_active' => 'master-data.*',
                'is_dropdown' => true,
                'dropdown' => [
                    [
                        'label' => 'Kategori',
                        'route_name' => 'master-data.kategori.index',
                        'route_active' => 'master-data.kategori.*',
                    ],
                    [
                        'label' => 'Produk',
                        'route_name' => 'master-data.product.index',
                        'route_active' => 'master-data.product.*',
                    ],
                ],
            ],

        ]);
    }
}
