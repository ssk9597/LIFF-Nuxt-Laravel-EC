<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PayloadController extends Controller
{
  public function store(Request $request)
  {
    // API
    $stripeApiKey = config("env.stripe_api_key");
    \Stripe\Stripe::setApiKey($stripeApiKey);

    // header
    header('Content-Type: application/json');

    // domain
    $DOMAIN = "https://liff-nuxt-laravel-ec.netlify.app";

    // product_price


    // checkout
    // $checkout_session = \Stripe\Checkout\Session::create([
    //   'payment_method_types' => ['card'],
    //   'line_items' => [[
    //     'price' => '{{PRICE_ID}}',
    //     'quantity' => 1,
    //   ]],
    //   'mode' => 'payment',
    //   'success_url' => $DOMAIN . '/success.html',
    //   'cancel_url' => $DOMAIN . '/cancel.html',
    // ]);
  }
}
