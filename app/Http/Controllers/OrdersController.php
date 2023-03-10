<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $user = $request->user();
        $orders = $user->orders()->with('details.product')->get();
        return view('orders.index', ['orders' => $orders]);
    }


    public function show(Request $request, $id)
    {
        $user = $request->user();
        $order = $user->orders()->with('details.product')->findOrFail($id);
        return view('orders.show', ['order' => $order]);
    }
}
