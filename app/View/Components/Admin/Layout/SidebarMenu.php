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
