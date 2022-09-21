<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CardController;
use App\Http\Controllers\BotController;

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\BotMiddleware;
use App\Http\Middleware\JsonMiddleware;
use App\Http\Middleware\CardMiddleware;
use App\Http\Middleware\TokenMiddleware;

Route::middleware([JsonMiddleware::class, TokenMiddleware::class])->group(function () {
    Route::get   ("/card",          [CardController::class, "index"  ]);
    Route::post  ("/card",          [CardController::class, "store"  ])->middleware(AdminMiddleware::class);
    Route::get   ("/card/{idCard}", [CardController::class, "show"   ])->middleware(CardMiddleware::class);
    Route::put   ("/card/{idCard}", [CardController::class, "update" ])->middleware(CardMiddleware::class);
    Route::delete("/card/{idCard}", [CardController::class, "destroy"])->middleware(CardMiddleware::class);

    Route::get   ("/bot",           [BotController::class, "index"  ]);
    Route::post  ("/bot",           [BotController::class, "store"  ])->middleware(AdminMiddleware::class);
    Route::get   ("/bot/{idBot}",   [BotController::class, "show"   ])->middleware(BotMiddleware::class);
    Route::put   ("/bot/{idBot}",   [BotController::class, "update" ])->middleware(BotMiddleware::class);
    Route::delete("/bot/{idBot}",   [BotController::class, "destroy"])->middleware(BotMiddleware::class);
});
