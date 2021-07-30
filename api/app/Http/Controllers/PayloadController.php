<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// stripe
use Stripe\Stripe;
use Stripe\Checkout\Session;
// guzzle
use GuzzleHttp\Client;

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

    // line
    $idToken = $request->input("idToken");

    // env
    $clientID = config("env.line_client_id");

    // guzzle
    $client = new Client();
    $response = $client->request("POST", "https://api.line.me/oauth2/v2.1/verify", [
      "form_params" => [
        "id_token" => $idToken,
        "client_id" => $clientID
      ]
    ]);

    $profile = json_decode($response->getBody()->getContents(), true);
    $profileEmail = $profile["email"];

    // checkout
    $checkout_session = Session::create([
      'customer_email' => $profileEmail,
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
