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
      $HubSpotApiKey = config("env.hubspot_api_key");

      // guzzle
      $client = new Client();
      $response = $client->request("POST", "https://api.line.me/oauth2/v2.1/verify", [
        "form_params" => [
          "id_token" => $idToken,
          "client_id" => $clientID
        ]
      ]);

      // HubSpot Value
      $profile = json_decode($response->getBody()->getContents(), true);
      $profileName = $profile["name"];
      $profileEmail = $profile["email"];
      Log::info($profile["name"]);
      Log::info($profile["email"]);

      $a = [
        "properties" => [
          "email" => $profileEmail,
          "firstname" => $profileName
        ]
      ];

      $b = json_encode($a, JSON_UNESCAPED_UNICODE);

      Log::info($b);

      $hubspot = $client->request("POST", "https://api.hubapi.com/crm/v3/objects/contacts?hapikey=" . $HubSpotApiKey, [
        "headers" => [
          'content-type' => 'application/json'
        ],
        'form_params' => [$b]
      ]);

      Log::info($hubspot);
    } catch (\GuzzleHttp\Exception\BadResponseException $e) {
      Log::info($e);
      return $e->getResponse()->getBody()->getContents();
    }
  }
}
