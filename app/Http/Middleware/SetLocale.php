<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public function handle(Request $request, Closure $next): Response
    {
        $locale = 'en';

        if (auth()->check()) {
            $locale = auth()->user()->language ?? 'en';
        }

        // Mazeoz Food kwa sasa inatumia lugha mbili tu
        if (!in_array($locale, ['en', 'sw'])) {
            $locale = 'en';
        }

        app()->setLocale($locale);

        return $next($request);
    }
}