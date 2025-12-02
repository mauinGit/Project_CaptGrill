<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    public function index()
    {
        $makanan = MenuItem::where('category', 'makanan')->get();
        $minuman = MenuItem::where('category', 'minuman')->get();
        $paymentMethods = Order::paymentMethods();

        return view('page.kasir', compact('makanan', 'minuman', 'paymentMethods'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name'    => 'nullable|string|max:255',
            'payment_method'   => 'required|string',
            'cash_given'       => 'required|numeric',
            'change_amount'    => 'required|numeric',
            'items'            => 'required|array|min:1',
            'items.*.id'       => 'required|exists:menu_items,id',
            'items.*.quantity' => 'required|numeric|min:1',
        ]);

        DB::beginTransaction();

        try {
            // Hitung total
            $totalAmount = 0;
            $orderItems = [];
            foreach ($request->items as $item) {
                $menuItem = MenuItem::findOrFail($item['id']);
                $subtotal = $menuItem->price * $item['quantity'];
                $totalAmount += $subtotal;

                $orderItems[] = [
                    'id' => $menuItem->id,
                    'name' => $menuItem->name,
                    'price' => $menuItem->price,
                    'quantity' => $item['quantity'],
                    'subtotal' => $subtotal
                ];
            }

            // Generate order_code
            $today = now()->format('Ymd');
            $count = Order::whereDate('created_at', today())->count() + 1;
            $orderCode = 'ORD-' . $today . '-' . str_pad($count, 3, '0', STR_PAD_LEFT);
            $totalQty = collect($request->items)->sum('quantity');

            // Simpan order
            $order = Order::create([
                'order_code'    => $orderCode,
                'customer_name' => $request->customer_name,
                'payment_method' => $request->payment_method,
                'total_amount'  => $totalAmount,
                'cash_given'    => $request->cash_given,
                'change_amount' => $request->change_amount,
                'quantity'      => $totalQty,  // <-- tinggal ini
            ]);


            // Simpan item ke pivot + potong stok
            foreach ($request->items as $item) {
                $menuItem = MenuItem::findOrFail($item['id']);
                $subtotal = $menuItem->price * $item['quantity'];

                $order->menuItems()->attach($menuItem->id, [
                    'quantity' => $item['quantity'],
                    'price'    => $menuItem->price,
                    'subtotal' => $subtotal,
                ]);

                // kalau mau langsung potong stok ingredients di sini (backup)
                foreach ($menuItem->ingredients as $ingredient) {
                    $used = $ingredient->pivot->quantity_used * $item['quantity'];
                    $ingredient->decrement('stock', $used);
                }
            }

            DB::commit();

            return response()->json([
                'success'    => true,
                'message'    => 'Transaksi berhasil disimpan',
                'order' => [
                    'id' => $order->id,
                    'order_code' => $order->order_code,
                    'customer_name' => $order->customer_name,
                    'payment_method' => $order->payment_method,
                    'total_amount' => $order->total_amount,
                    'cash_given' => $order->cash_given,
                    'change_amount' => $order->change_amount,
                    'items' => $orderItems
                ]
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => 'Gagal menyimpan transaksi',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }
}
