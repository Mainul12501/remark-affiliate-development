<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function (){
            Route::middleware('web')
                ->group(base_path("routes/admin.php"));
        }
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'auth.acl'          => \Uzzal\Acl\Middleware\AuthenticateWithAcl::class,
            'resource.maker'    => \Uzzal\Acl\Middleware\ResourceMaker::class,
            'password.expiry'   => \App\Http\Middleware\PasswordExpiryCheck::class,
            'userApproveStatusCheck' => \App\Http\Middleware\UserApproveStatusCheck::class,
            'noAuthCheck' => \App\Http\Middleware\NoAuthPagesMiddleware::class,
        ]);
        $middleware->redirectGuestsTo('/');
    })
    ->withCommands([
        \Uzzal\Acl\Commands\AclResource::class,
    ])
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
