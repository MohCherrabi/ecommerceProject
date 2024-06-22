<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class DashboardContrller extends Controller
{
    public function dashboard() {
        $nbOrders = Order::count();
        $d = true;
        return view('back-end.dashboard',compact('d','nbOrders'));
    }
}
