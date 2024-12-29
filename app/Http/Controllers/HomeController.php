<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Menu;


class HomeController extends Controller
{

    public function index() {
        return view('home.userpage');
    }
    public function redirect(){
        $usertype = Auth::user()->usertype;
        $user_kode_tenant = Auth::user()->kode_tenant;
        if($usertype=='1') {
            $menus = Menu::where('kode_tenant', $user_kode_tenant)->get();
            return view('manage_sell_menu.index', compact("menus"));
        }
        else {
            return view('home.userpage');
        }
    }
}
