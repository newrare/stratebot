<?php

namespace App\Console\Commands;

use Artisan;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class makeApi extends Command
{
    protected $signature    = 'make:api {name}';
    protected $description  = 'Create a new Migration, Model, Middleware, Controller, View, Test and routes';

    public function handle()
    {
        //argument
        $name = ucfirst($this->argument('name'));

        //migration
        $this->info("Creating $name Migration...");
        Artisan::call("make:migration create$name" . 'sTable');

        //model
        $this->info("Creating $name Model...");
        Artisan::call("make:model $name");

        //middleware
        $this->info("Creating $name Middleware...");

        $content    = Storage::get('stubs/custom.middleware.stub');

        $search     = '{{ class }}';
        $replace    = $name . 'Middleware';
        $content    = Str::replace($search, $replace, $content);

        $search     = '{{ model }}';
        $replace    = $name;
        $content    = Str::replace($search, $replace, $content);

        Storage::put("app/Http/Middleware/$name" . 'Middleware.php' , $content);

        //controller
        $this->info("Creating $name Controller...");
        Artisan::call("make:controller $name" . "Controller --model=$name");

        //view
        $this->info("Creating $name View...");

        $content    = Storage::get('stubs/custom.view.stub');

        $search     = '{{ class }}';
        $replace    = $name;
        $content    = Str::replace($search, $replace, $content);

        Storage::put("resources/views/create$name" . '.blade.php' , $content);

        //test
        $this->info("Creating $name Test...");

        $content    = Storage::get('stubs/custom.test.stub');

        $search     = '{{ class }}';
        $replace    = $name . 'Test';
        $content    = Str::replace($search, $replace, $content);

        $search     = '{{ model }}';
        $replace    = $name;
        $content    = Str::replace($search, $replace, $content);

        $search     = '{{ modelVariable }}';
        $replace    = strtolower($name);
        $content    = Str::replace($search, $replace, $content);

        Storage::put("tests/Unit/$name" . 'Test.php' , $content);

        //route API
        $this->info("Updating route API...");

        $content    = Storage::get('routes/api.php');

        $search     = 'use App\Http\Controllers\CardController;';
        $replace    = 'use App\Http\Controllers\CardController;
use App\Http\Controllers\\' . $name . 'Controller;';
        $content    = Str::replace($search, $replace, $content);

        $search     = 'use App\Http\Middleware\AdminMiddleware;';
        $replace    = 'use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\\' . $name . 'Middleware;';
        $content    = Str::replace($search, $replace, $content);

        $search     = '});';
        $replace    = '
    Route::get   ("/' . strtolower($name) . '",          [' . $name . 'Controller::class, "index"  ]);
    Route::post  ("/' . strtolower($name) . '",          [' . $name . 'Controller::class, "store"  ])->middleware(AdminMiddleware::class);
    Route::get   ("/' . strtolower($name) . '/{id' . $name . '}", [' . $name . 'Controller::class, "show"   ])->middleware(' . $name . 'Middleware::class);
    Route::put   ("/' . strtolower($name) . '/{id' . $name . '}", [' . $name . 'Controller::class, "update" ])->middleware(' . $name . 'Middleware::class);
    Route::delete("/' . strtolower($name) . '/{id' . $name . '}", [' . $name . 'Controller::class, "destroy"])->middleware(' . $name . 'Middleware::class);
});';
        $content    = Str::replace($search, $replace, $content);

        Storage::put('routes/api.php', $content);

        //route web
        $this->info("Updating route web...");

        $content    = Storage::get('routes/web.php');

        $search     = 'use App\Http\Controllers\CardController;';
        $replace    = 'use App\Http\Controllers\CardController;
use App\Http\Controllers\\' . $name . 'Controller;';

        $content    = Str::replace($search, $replace, $content);

        $search     = '});';
        $replace    = '
    Route::get   ("/create/' . strtolower($name) . '",   [' . $name . 'Controller::class,     "create"])->middleware(AdminMiddleware::class)->name("create' . $name . '");
});';

        $content    = Str::replace($search, $replace, $content);

        Storage::put('routes/web.php', $content);

        return 0;
    }
}
