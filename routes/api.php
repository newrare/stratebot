<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CardController;

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\ApiMiddleware;
use App\Http\Middleware\TokenMiddleware;

Route::middleware([ApiMiddleware::class, TokenMiddleware::class])->group(function () {
    Route::get   ("/Card",          [CardController::class, "index"  ]);
    Route::post  ("/card",          [CardController::class, "store"  ])->middleware(AdminMiddleware::class);
    Route::get   ("/Card/{idCard}", [CardController::class, "show"   ])->middleware(AdminMiddleware::class);
    Route::put   ("/Card/{idCard}", [CardController::class, "update" ])->middleware(AdminMiddleware::class);
    Route::delete("/Card/{idCard}", [CardController::class, "destroy"])->middleware(AdminMiddleware::class);
});
