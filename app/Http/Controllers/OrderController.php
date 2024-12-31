<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\User;
use App\Models\Cart;


class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    // Show the form to create a new order
    public function create()
    {
        return view('orders.create');
    }

    // Store a newly created order
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string',
            'user_id' => 'nullable|string',
            'menu_nama' => 'nullable|string|max:255',
            'quantity' => 'nullable|string|max:255',
            'price' => 'nullable|string|max:255',
            'image' => 'nullable|string',
            'menu_id' => 'nullable|string|max:255',
            'payment_status' => 'nullable|string|max:255',
            'delivery_status' => 'nullable|string|max:255',
        ]);

        Order::create($request->all());

        return redirect()->route('orders.index')->with('success', 'Order created successfully.');
    }

    // Show the form to edit an order
    public function edit(Order $order)
    {
        return view('orders.edit', compact('order'));
    }

    // Update the specified order
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string',
            'user_id' => 'nullable|string',
            'menu_nama' => 'nullable|string|max:255',
            'quantity' => 'nullable|string|max:255',
            'price' => 'nullable|string|max:255',
            'image' => 'nullable|string',
            'menu_id' => 'nullable|string|max:255',
            'payment_status' => 'nullable|string|max:255',
            'delivery_status' => 'nullable|string|max:255',
        ]);

        $order->update($request->all());

        return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
    }

    // Delete the specified order
    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }
    
    public function payment(){
        $user = Auth::user();
        $userid = $user->id;

        $data = Cart::where('user_id','=',$userid)->get();

        foreach($data as $data){

            $order = new Order;
            $order->name=$data->name;
            $order->email=$data->email;
            $order->phone=$data->phone;
            $order->address=$data->address;
            $order->user_id=$data->user_id;

            $order->menu_nama=$data->menu_nama;
            $order->price=$data->price;
            $order->quantity=$data->quantity;
            $order->image=$data->image;
            $order->menu_id=$data->menu_id;

            $order->payment_status="Berhasil";
            $order->delivery_status="Dalam Proses";

            $order->save();

            $cart_id = $data->id;
            $cart= Cart::find($cart_id);
            $cart->delete();

        }

        return redirect()->route('cart.show')->with('message', 'Terima kasih telah memesan disini :)');
    }
    public function showQr(){
        return view('order.qr');
    }
}
