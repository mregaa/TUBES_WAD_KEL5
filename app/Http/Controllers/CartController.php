<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Cart;


class CartController extends Controller
{
    public function add_cart(Request $request,$id){
        if(Auth::id()){
            $user = Auth::user();
            $menu = Menu::find($id);
            
            $cart = new Cart;

            $cart->user_id=$user->id;
            $cart->name=$user->name;
            $cart->email=$user->email;
            $cart->phone=$user->phone;
            $cart->address=$user->address;
            $cart->user_id=$user->id;

            $cart->menu_nama=$menu->nama_menu;
            $cart->price=$menu->harga * $request->quantity;
            $cart->image=$menu->image;
            $cart->menu_id=$menu->id;
            $cart->quantity=$request->quantity;

            $cart->save();

            return redirect()->back();    

        }
        else{
            return redirect('login');
        }
    }

    public function show_cart(){

        $id = Auth::user()->id;

        $carts = Cart::where('user_id','=',$id)->get();
        return view('cart.showcart', compact('carts'));
    }

    public function remove_cart($id){
        $cart = Cart::find($id);
        $cart->delete();
        
        return redirect()->back();
    }
}
