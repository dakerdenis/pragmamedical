<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        $lang = $request->route('lang', 'az');
        app()->instance('current_lang', $lang);
        app()->setLocale($lang);

        return $next($request);
    }
}