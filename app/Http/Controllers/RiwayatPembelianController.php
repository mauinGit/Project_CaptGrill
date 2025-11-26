<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class RiwayatPembelianController extends Controller
{
    public function riwayatPembelian(Request $request)
    {
        $query = Order::with('menuItems')->latest();

        if ($request->has('start_date') && $request->has('end_date')) {
            $query->whereBetween('created_at', [
                $request->start_date . ' 00:00:00',
                $request->end_date . ' 23:59:59'
            ]);
        }

        $orders = $query->paginate(10);

        return view('page.riwayat-pembelian', compact('orders'));
    }

    public function getOrderDetails($id)
    {
        $order = Order::with(['menuItems' => function ($query) {
            $query->withPivot(['quantity', 'price']);
        }])->findOrFail($id);

        $items = $order->menuItems->map(function ($item) {
            return [
                'name' => $item->name,
                'price' => $item->pivot->price,
                'quantity' => $item->pivot->quantity,
            ];
        });

        return response()->json([
            'items' => $items
        ]);
    }

    public function struk($id)
    {
        $order = Order::with('menuItems')->findOrFail($id);
        return view('pdf.order-invoice', compact('order'));
    }
}
