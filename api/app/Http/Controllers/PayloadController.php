<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class PayloadController extends Controller
{
  public function store(Request $request)
  {
    // API
    $stripeApiKey = config("env.stripe_api_key");
    Stripe::setApiKey($stripeApiKey);

    // header
    header('Content-Type: application/json');

    // domain（仮ドメイン）
    $domain = "https://deploy-preview-4--liff-nuxt-laravel-ec.netlify.app";

    // product
    $productImage = $request->input("productImage");
    $productName = $request->input("productName");
    $productPrice = $request->input("productPrice");
    $productStripePriceApi = $request->input("productStripePriceApi");

    // checkout
    $checkout_session = Session::create([
      'payment_method_types' => ['card'],
      'line_items' => [[
        'price' => $productStripePriceApi,
        'quantity' => 1,
      ]],
      'mode' => 'payment',
      'success_url' => $domain . '/success',
      'cancel_url' => $domain . '/cancel',
    ]);

    header("HTTP/1.1 303 See Other");
    header("Location: " . $checkout_session->url);
  }
}
