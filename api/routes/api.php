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

Route::post("/hubspot", "HubSpotController@index");
Route::post("/hubspot/store", "HubSpotController@store");
