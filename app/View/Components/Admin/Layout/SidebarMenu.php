<?php

namespace App\View\Components\Admin\Layout;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SidebarMenu extends Component
{
    public $menu;

    public function __construct()
    {
        $this->menu = [
            [
                [
                    'name' => 'Go to app',
                    'route' => 'home',
                    'is' => 'home',
                    'icon' => 'home',
                ],
            ],
            [
                [
                    'name' => 'Dashboard',
                    'route' => 'admin.dashboard',
                    'is' => 'admin.dashboard',
                    'icon' => 'tachometer-alt',
                ],
                [
                    'name' => 'Users',
                    'route' => 'admin.users.index',
                    'is' => 'admin.users*',
                    'icon' => 'users',
                ],
                [
                    'name' => 'Orders',
                    'route' => 'admin.orders.index',
                    'is' => 'admin.orders*',
                    'icon' => 'wallet',
                ],
            ],
            [
                [
                    'name' => 'Products',
                    'route' => 'admin.products.index',
                    'is' => 'admin.products*',
                    'icon' => 'suitcase',
                ],
                [
                    'name' => 'Categories',
                    'route' => 'admin.categories.index',
                    'is' => 'admin.categories*',
                    'icon' => 'list',
                ],
            ],
            [
                [
                    'name' => 'Order Reports',
                    'route' => 'admin.reports.orders',
                    'is' => 'admin.reports.orders',
                    'icon' => 'file-lines',
                ],
                [
                    'name' => 'Product Reports',
                    'route' => 'admin.reports.products',
                    'is' => 'admin.reports.products',
                    'icon' => 'file-lines',
                ],
            ]
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.admin.layout.sidebar-menu');
    }
}
