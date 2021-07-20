<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class HubSpotController extends Controller
{
  public function store(Request $request)
  {
    try {
      // request
      $idToken = $request->input("idToken");

      // env
      $clientID = config("env.line_client_id");
      return $clientID;

      // // guzzle
      // $client = new Client();
      // $response = $client->request("POST", "https://api.line.me/oauth2/v2.1/verify", [
      //   "form_params" => [
      //     "id_token" => $idToken,
      //     "client_id" => $clientID
      //   ]
      // ]);

      // return $response;
    } catch (\Exception $e) {
      return $e;
    }
  }
}
