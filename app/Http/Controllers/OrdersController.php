<?php

namespace App\Http\Controllers;

use App\Helpers\ProofHelper;
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
        $orders = $user->orders()->with('details.product')->paginate(10);
        return view('orders.index', ['orders' => $orders]);
    }

    public function show(Request $request, $id)
    {
        $user = $request->user();
        $order = $user->orders()->with('details.product')->findOrFail($id);
        return view('orders.show', ['order' => $order]);
    }


    public function updateProof(Request $request, $id)
    {
        $user = $request->user();
        $order = $user->orders()->findOrFail($id);

        $data = $request->validate([
            'image' => 'required|image|max:' . env('MAX_IMAGE_SIZES', '3000')
        ]);

        $name = ProofHelper::generate($data['image'], $order->proof);
        $order->update(['proof' => $name]);

        return response()->json(['proof_url' => $order->proof_url]);
    }

    public function confirmReceived(Request $request, $id)
    {
        $user = $request->user();
        $order = $user->orders()->where('status', 'delivery')->findOrFail($id);
        $order->update(['status' => 'complete']);
        return redirect()->back()->withSuccess('Confirmation successfully');
    }

    public function cancelOrder(Request $request, $id)
    {
        $user = $request->user();
        $order = $user->orders()->where('status', 'pending')->findOrFail($id);
        $order->delete();
        return redirect()->route('orders.index')->withSuccess('Confirmation successfully');
    }
}
