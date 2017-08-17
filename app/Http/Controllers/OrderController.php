<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{
    public function show($status = '') {
        if ($status == 'pending') {
            $orders = Order::where('delivered', 0)->get(); 
        } else if ($status == 'delivered') {
            $orders = Order::where('delivered', 1)->get(); 
        } else {
            $orders = Order::all();
        }
        return view('admin.order.index', compact('orders'));
    }

    public function changeStatus(Request $request, $id) {
        Order::find($id)->update(['delivered' => $request->status]);
        return back();
    }
}
