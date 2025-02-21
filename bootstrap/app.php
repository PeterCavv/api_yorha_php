<?php

use App\Http\Middleware\AlwaysAcceptJsonMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
//        $middleware->api(prepend: [
//            \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
//        ]);
//
//        $middleware->alias([
//            'verified' => \App\Http\Middleware\EnsureEmailIsVerified::class,
//        ]);

        $middleware->statefulApi();
        $middleware->prependToGroup('api', AlwaysAcceptJsonMiddleware::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->renderable(function (ValidationException $e, Request $request) {
                return response()->json([
                    'error' => 'La validación falló',
                    'message' => $e->getMessage(),
                    'errors' => $e->errors(),
                ], 422);
        });

        return response()->json([
            'error' => 'Error interno del servidor'
        ], 500);
    })->create();
