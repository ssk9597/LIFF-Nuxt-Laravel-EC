<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

// Log
use Illuminate\Support\Facades\Log;

class HubSpotController extends Controller
{
  public function store(Request $request)
  {
    try {
      // request
      $idToken = $request->input("idToken");

      // env
      $clientID = config("env.line_client_id");

      // guzzle
      $client = new Client();
      $response = $client->request('GET', 'https://api.github.com/repos/guzzle/guzzle');
      $response = $client->request("POST", "https://api.line.me/oauth2/v2.1/verify", [
        "form_params" => [
          "id_token" => $idToken,
          "client_id" => $clientID
        ]
      ]);

      $profile = $response->getBody()->getContents();

      $name = $profile[name];
      Log::info($name);
      Log::info($response->getBody()->getContents());
      return $response->getBody()->getContents();
    } catch (\GuzzleHttp\Exception\BadResponseException $e) {
      Log::info($e);
      return $e->getResponse()->getBody()->getContents();
    }
  }
}
