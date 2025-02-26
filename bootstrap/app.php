<?php

use Illuminate\Foundation\Application;
use Torchlight\Middleware\RenderTorchlight;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        // web: __DIR__.'/../routes/web.php',
        // commands: __DIR__.'/../routes/console.php',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->append(RenderTorchlight::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
