<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Aside extends Component
{
    public $routes;

    public function __construct()
    {
        $this->routes = [

            // 🔹 DASHBOARD
            [
                "label" => "Dashboard",
                "icon" => "fas fa-tv",
                "route_name" => "dashboard",
                "route_active" => "dashboard",
                "is_dropdown" => false
            ],

            // 🔥 KASIR (BARU)
            [
                "label" => "Kasir",
                "icon" => "fas fa-cash-register",
                "route_name" => "kasir",
                "route_active" => "kasir",
                "is_dropdown" => false
            ],

            // 🔹 MASTER DATA
            [
                "label" => "Master Data",
                "icon" => "fas fa-database",
                "route_active" => "master-data.*",
                "is_dropdown" => true,
                "dropdown" => [
                    [
                        "label" => "Kategori",
                        "route_active" => "master-data.kategori.*",
                        "route_name" => "master-data.kategori.index",
                    ],
                    [
                        "label" => "Product",
                        "route_active" => "master-data.product.*",
                        "route_name" => "master-data.product.index",
                    ],
                ]
            ]
        ];
    }

    public function render(): View|Closure|string
    {
        return view('components.admin.aside');
    }
}
