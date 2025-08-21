<?php

use App\Http\Middleware\GuestMiddleware;
use App\Http\Middleware\RoleAdministratorMiddleware;
use App\Http\Middleware\RoleCustomerMiddleware;
use App\Http\Middleware\RoleCustomerNA;
use App\Http\Middleware\StorePendingPurchase;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
        $middleware->alias([
            'admin' => RoleAdministratorMiddleware::class,
            'customer' => RoleCustomerMiddleware::class,
            'guest' => GuestMiddleware::class,
            'customer-not-auth' => RoleCustomerNA::class,
            'store-pending-purchase' => StorePendingPurchase::class,
        ]);
        $middleware->validateCsrfTokens(except: [
            'stripe/*',
            '/webhook',

        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
