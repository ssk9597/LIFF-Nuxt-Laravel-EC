<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::get("/", function () {
  return "Hello World!";
});

// HubSpotにユーザーを登録する
Route::post("/hubspot/store", "HubSpotController@store");

// Stripeを使って決済を行う
Route::post("/stripe/store", "PayloadController@store");
