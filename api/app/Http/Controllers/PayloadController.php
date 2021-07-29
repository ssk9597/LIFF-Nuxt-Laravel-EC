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

    // return redirect($checkout_session->url, 303, [], true);
    return $checkout_session->url;
  }
}
