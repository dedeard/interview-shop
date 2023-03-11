<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ProofHelper;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index(Request $request)
    {
        $tab = $request->input('tab');
        abort_unless(in_array($tab ?? 'all', ['all', 'pending', 'processed', 'delivery', 'complete']), 404);
        $query = Order::with(['details.product', 'user']);
        if ($tab) $query->where('status', $tab);
        $orders = $query->orderBy('id', 'desc')->paginate(10)->appends([
            'tab' => $tab
        ]);
        return view('admin.orders.index', ['orders' => $orders, 'tab' => $tab ?? 'all']);
    }

    public function show(string $id)
    {
        $order = Order::with('details.product')->findOrFail($id);
        return view('admin.orders.show', ['order' => $order]);
    }

    public function destroy(string $id)
    {
        $order = Order::findOrFail($id);
        ProofHelper::destroy($order->proof);
        $order->delete();
        return redirect()->route('admin.orders.index')->withSuccess('Order has deleted');
    }

    public function confirmTransaction(string $id)
    {
        $order = Order::where('status', 'pending')->findOrFail($id);
        $order->update(['status' => 'processed']);
        return redirect()->back()->withSuccess('Order has confirmed');
    }

    public function updateReceipt(Request $request, string $id)
    {
        $order = Order::where('status', 'processed')->findOrFail($id);
        $data = $request->validate(['receipt_number' => 'required|max:255']);
        $order->update(['status' => 'delivery', 'receipt_number' => $data['receipt_number']]);
        return redirect()->back()->withSuccess('Receipt number has updated');
    }
}
