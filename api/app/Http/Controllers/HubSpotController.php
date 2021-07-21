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


      // Register HubSpot
      $data = array(
        "properties" => [
          "email" => $profileEmail,
          "firstname" => $profileName
        ]
      );

      $formParams = json_encode($data, JSON_UNESCAPED_UNICODE);

      Log::info($formParams);

      $hubspot = $client->request("POST", "https://api.hubapi.com/crm/v3/objects/contacts?hapikey=" . $HubSpotApiKey, [
        "headers" => [
          'content-type' => 'application/json'
        ],
        'form_params' => "{\"properties\":{\"email\":\"bbb@gmail.com\",\"firstname\":\"bbb\"}}"
      ]);

      Log::info($hubspot);

      // $curl = curl_init();

      // curl_setopt_array($curl, array(
      //   CURLOPT_URL => "https://api.hubapi.com/crm/v3/objects/contacts?hapikey=" . $HubSpotApiKey,
      //   CURLOPT_RETURNTRANSFER => true,
      //   CURLOPT_ENCODING => "",
      //   CURLOPT_MAXREDIRS => 10,
      //   CURLOPT_TIMEOUT => 30,
      //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      //   CURLOPT_CUSTOMREQUEST => "POST",
      //   CURLOPT_POSTFIELDS => "{\"properties\":{\"email\":\"aaa@gmail.com\",\"firstname\":\"aaa\"}}",
      //   CURLOPT_HTTPHEADER => array(
      //     "accept: application/json",
      //     "content-type: application/json"
      //   ),
      // ));

      // $response = curl_exec($curl);
      // $err = curl_error($curl);
      // curl_close($curl);

      // if ($err) {
      //   Log::info($err);
      // } else {
      //   Log::info($response);
      // }
    } catch (\GuzzleHttp\Exception\BadResponseException $e) {
      Log::info($e);
      return $e->getResponse()->getBody()->getContents();
    }
  }
}
