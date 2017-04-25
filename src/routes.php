<?php


use Illuminate\Support\Facades\Route;

Route::get("/webforms", "\\Alnutile\\Webforms\\WebformsController@index");
Route::get("/webforms/create", "\\Alnutile\\Webforms\\WebformsController@create");
Route::get("/webforms/{webform_id}/edit", "\\Alnutile\\Webforms\\WebformsController@edit");
Route::post("/webforms", "\\Alnutile\\Webforms\\WebformsController@store");
Route::put("/webforms/{webform_id}", "\\Alnutile\\Webforms\\WebformsController@update");
Route::get("/webforms/{webform_id}", "\\Alnutile\\Webforms\\WebformsController@show");