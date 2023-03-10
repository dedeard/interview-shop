<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $user = $request->user();
        $carts = $user->carts()->with('product')->get();
        return view('carts', ['carts' => $carts]);
    }

    // public function add(Request $request, string $id)
    // {
    //     $user = $request->user();
    //     $cart = $user->carts()->where('product_id', $id)->get();
    //     if ($cart) {
    //         $cart->update(['count' => $cart->count + 1]);
    //     } else {
    //         $cart = Cart::create([
    //             'user_id' => $user->id,
    //             'product_id' => $id,
    //             'count' => 1
    //         ]);
    //     }
    //     return response()->json($cart);
    // }
}
