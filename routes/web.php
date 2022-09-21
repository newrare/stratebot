<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CardController;
use App\Http\Controllers\BotController;
use App\Http\Controllers\CreateController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ErrorController;

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;

Route::get("/",         [HomeController::class,     "index"])->name('home');
Route::get("/test",     [TestController::class,     "index"])->name('test');
Route::get("/error",    [ErrorController::class,    "index"])->name('error');

Route::middleware([UserMiddleware::class])->group(function () {
    Route::get   ("/create",        [CreateController::class,   "index" ])->middleware(AdminMiddleware::class)->name('create');
    Route::get   ("/create/card",   [CardController::class,     "create"])->middleware(AdminMiddleware::class)->name('createCard');

    Route::get   ("/create/bot",    [BotController::class,      "create"])->middleware(AdminMiddleware::class)->name("createBot");
});
