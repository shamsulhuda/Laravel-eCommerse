<?php

namespace App\Http\Controllers;


use Mail;
use Cart;
use Session;
use Stripe\Charge;
use Stripe\Stripe;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //checkout page
    public function index()
    {
        if(Cart::content()->count() == 0)
        {
            Session::flash('info', 'Your Cart is still empty! Shop now!');

            return redirect()->back();
        }
        return view('checkout');
    }

    // payments
    public function pay(){
        $t =Cart::total();
        if(is_string($t))
            $a = str_replace(',', '', $t);
        else
            $a ='does not work';
//        dd($a);
        Stripe::setApiKey("sk_test_yfI0mbpmTxSFiCwDNiwAKNUG");
        $token = request()->stripeToken;
        $charge = Charge::create([
            'amount'=> Cart::total() * 100,
            'currency'=>'usd',
            'description'=>'Lake cart',
            'source'=>request()->stripeToken
        ]);
        
        Session::flash('success', 'Purchase successfull, Wait for our conformation mail!');

        Cart::destroy();

        Mail::to(request()->stripeEmail)->send(new \App\Mail\PurchaseSuccessful);

        return redirect('/');
    }
}
