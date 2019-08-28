<?php

namespace App\Http\Controllers;

use Cart;
use Session;
use App\Product;
use Illuminate\Http\Request;

class ShoppingController extends Controller
{
    public function add_to_cart()
    {
        // dd(request()->all());

        $pdt = Product::find(request()->pdt_id);

        $cartItem = Cart::add([
            'id' => $pdt->id,
            'name' => $pdt->name,
            'qty' => request()->qty,
            'price' => $pdt->price
        ]);

        Cart::associate($cartItem->rowId, 'App\Product');

        Session::flash('success', 'Product successfully added to the cart!');

        return redirect()->route('cart');
    }

    // cart details

    public function cart()
    {
        // Cart::destroy();
        return view('cart');
    }

    // Delete cart

    public function cart_delete($id)
    {
        Cart::remove($id);

        Session::flash('success', 'Product removed from cart!');

        return redirect()->back();
    }

    // Quantity increament and deccreament
    public function incr($id, $qty)
    {
        Cart::update($id, $qty +1);

        Session::flash('success', 'Product quantity updated!');
        return redirect()->back();
    }

    public function decr($id, $qty)
    {
        Cart::update($id, $qty -1);

        Session::flash('success', 'Product quantity updated!');
        return redirect()->back();
    }

    // Directly add to the cart
    public function rapid_add($id)
    {
        $pdt = Product::find($id);

        $cartItem = Cart::add([
            'id' => $pdt->id,
            'name' => $pdt->name,
            'qty' => 1,
            'price' => $pdt->price
        ]);

        Cart::associate($cartItem->rowId, 'App\Product');

        Session::flash('success', 'Product added to the cart!');

        return redirect()->route('cart');
    }
}
