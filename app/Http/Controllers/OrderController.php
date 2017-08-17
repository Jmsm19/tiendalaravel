<?php

namespace App\Http\Controllers;

use App\Mail\OrderShipped;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
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
        if ($request->status == 1) {
            $order = Order::find($id);
            $user = $order->user;
            Mail::to($order->user->email)->send(new OrderShipped($user, $order));
        }
        Order::find($id)->update(['delivered' => $request->status]);
        return back();
    }
}
