<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $orderitem = OrderItem::all();
        $userData = User::all();
        return view('dashboard', compact('orderitem', 'userData'));
    }

    // public function nav()
    // {

    //     return view('components.nav', compact('userData'));
    // }
}
