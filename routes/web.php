<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CardController;
use App\Http\Controllers\CreateController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;

Route::get("/",     [HomeController::class, "index"]);
Route::get("/test", [TestController::class, "index"]);

Route::middleware([UserMiddleware::class])->group(function () {
    Route::get   ("/create",        [CreateController::class,   "index" ])->middleware(AdminMiddleware::class);
    Route::get   ("/create/card",   [CardController::class,     "create"])->middleware(AdminMiddleware::class);
});
