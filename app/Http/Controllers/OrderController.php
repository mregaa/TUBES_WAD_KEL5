<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\User;
use App\Models\Cart;


class OrderController extends Controller
{
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
