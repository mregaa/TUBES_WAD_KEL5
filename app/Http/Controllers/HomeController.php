<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Menu;


class HomeController extends Controller
{

    public function index() {
        $menus = Menu::all();
        return view('home.userpage',compact("menus"));
    }
    
    public function redirect(){
        $usertype = Auth::user()->usertype;
        $user_kode_tenant = Auth::user()->kode_tenant;
        
        if($usertype=='1') {
            $menus = Menu::where('kode_tenant', $user_kode_tenant)->get();
            return view('manage_sell_menu.index', compact("menus"));
        }
        elseif($usertype=='99'){
            return view('admin.home');
        }
        else {
            $menus = Menu::all();
            return view('home.userpage',compact("menus"));
        }
    }

    public function product_details($id){
        $menu = Menu::find($id);
        return view('home.product_details',compact('menu'));
    }
}
