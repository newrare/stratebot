<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CardController;

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\ApiMiddleware;
use App\Http\Middleware\CardMiddleware;
use App\Http\Middleware\TokenMiddleware;

Route::middleware([ApiMiddleware::class, TokenMiddleware::class])->group(function () {
    Route::get   ("/card",          [CardController::class, "index"  ]);
    Route::post  ("/card",          [CardController::class, "store"  ])->middleware(AdminMiddleware::class);
    Route::get   ("/card/{idCard}", [CardController::class, "show"   ])->middleware(CardMiddleware::class);
    Route::put   ("/card/{idCard}", [CardController::class, "update" ])->middleware(CardMiddleware::class);
    Route::delete("/card/{idCard}", [CardController::class, "destroy"])->middleware(CardMiddleware::class);
});
