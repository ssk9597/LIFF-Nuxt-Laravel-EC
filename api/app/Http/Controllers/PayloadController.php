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
    $domain = "https://liff-nuxt-laravel-ec.netlify.app";

    // product
    $productImage = $request->input("productImage");
    $productName = $request->input("productName");
    $productPrice = $request->input("productPrice");

    // checkout
    $checkout_session = \Stripe\Checkout\Session::create([
      'payment_method_types' => ['card'],
      'line_items' => [[
        'price' => $productPrice,
        'quantity' => 1,
      ]],
      'mode' => 'payment',
      'success_url' => $domain . '/success.html',
      'cancel_url' => $domain . '/cancel.html',
    ]);
  }
}
