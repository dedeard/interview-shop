<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function orders()
    {
        $orders = Order::with(['details.product', 'user'])->get();
        $data = ['title' => 'Order Report - ' . now(), 'orders' => $orders];
        $pdf = Pdf::loadView('admin.reports.orders', $data);
        return $pdf->download('order-reports.pdf');
    }

    public function products()
    {
        $orders = Order::with(['details.product', 'user'])->get();
        $data = ['title' => 'Product Report - ' . now(), 'orders' => $orders];
        $pdf = Pdf::loadView('admin.reports.product-orders', $data);
        return $pdf->download('product-reports.pdf');
    }
}
