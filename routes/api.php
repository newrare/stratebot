<?php

use Illuminate\Support\Facades\Route;

Route::group(["middleware" => ["api", "token"]], function () {
    Route::get   ("/Card",          "CardController@index"      );
    Route::post  ("/Card",          "CardController@store"      )->middleware("admin");
    Route::get   ("/Card/{idCard}", "CardController@show"       )->middleware("admin");
    Route::put   ("/Card/{idCard}", "CardController@update"     )->middleware("admin");
    Route::delete("/Card/{idCard}", "CardController@destroy"    )->middleware("admin");
});
