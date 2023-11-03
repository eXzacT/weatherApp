<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $city='Dubrovnik';
    $apiKey=config('services.openWeather.key');

    $response=Http::get(
        "https://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}&units=metric");
    $responseFuture=Http::get(
        "https://api.openweathermap.org/data/2.5/forecast?q={$city}&cnt=40&appid={$apiKey}&units=metric");

    // Since api is giving us forecast every 3 hours, but we want daily we use a filter (03/11/2023)
    $dailyFutureWeather=collect($responseFuture['list'])->filter(function ($value,$key){
        return $key%8===0;
    });

    return view('welcome',[
        'currentWeather'=>$response->json(),
        'futureWeather' => $dailyFutureWeather,
    ]);
});
