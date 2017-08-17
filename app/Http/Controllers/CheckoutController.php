<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cart;
use App\Order;
use Session;

class CheckoutController extends Controller
{
    public function preparePurchase() {
        if (Auth::check()) {
            return redirect()->route('checkout.shipping');
        } else {
            return redirect('login');
        }
    }

    public function shipping() {
        $addresses = Auth::user()->address;
        return view('pages.shipping', compact('addresses'));
    }

    public function payment($id) {
        $cart = Cart::content();
        $address = Auth::user()->address[$id];
        return view('pages.payment', compact('cart', 'address'));
    }

    public function order($id) {
        $user = Auth::user();
        $cart = Cart::content();
        $address = Auth::user()->address[$id];
        $order = $user->orders()->create([
            'total' => Cart::total(),
            'delivered' => 0
        ]);

        foreach ($cart as $cartItem) {
            $order->orderedProduct()->attach($cartItem->id, [
                'qty' => $cartItem->qty,
                'total' => $cartItem->qty * $cartItem->price,
            ]);
        }

        Cart::destroy();
        Session::flash('message', 'Order completed');
        return redirect('/');
    }
}
