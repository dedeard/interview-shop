<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $user = $request->user();
        $carts = $user->carts()->with('product')->get();
        return view('checkout', ['carts' => $carts]);
    }

    public function checkout(Request $request)
    {
        $user = $request->user();
        $data = $request->validate([
            'address' => 'required|max:255'
        ]);

        $carts = $user->carts()->with('product')->get();
        abort_if(count($carts) == 0, 400);

        DB::beginTransaction();
        $order = Order::create([
            'user_id' => $user->id,
            'address' => $data['address']
        ]);
        $orderDetails = [];
        foreach ($carts as $cart) {
            array_push($orderDetails, [
                'order_id' => $order->id,
                'product_id' => $cart->product->id,
                'price' => $cart->product->price,
                'quantity' => $cart->quantity,
            ]);
        }
        OrderDetail::insert($orderDetails);
        $user->carts()->delete();
        DB::commit();

        return redirect()->route('orders.show', $order->id)->withSuccess('Order has created');
    }
}
