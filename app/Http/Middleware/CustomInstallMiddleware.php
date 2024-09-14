<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use InstallerErag\Middleware\InstallMiddleware as BaseInstallMiddleware;

class CustomInstallMiddleware extends BaseInstallMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Check if already installed
        if ($this->alreadyInstalled() && !empty(env('PURCHASE_CODE'))) {
            dd(env('PURCHASE_CODE'));
            return redirect('/');
        }

        // Add your additional check here
        if (!$this->alreadyInstalled() || env('PURCHASE_CODE') === null) {
            dd('install');
        }

        return $next($request);
    }
}
