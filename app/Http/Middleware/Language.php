<?php

namespace App\Http\Middleware;

use Closure;
use  Session;
use Illuminate\Routing\Redirector;
use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Contracts\Routing\Middleware;


class Language
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    protected $languages = ['en', 'fr'];
    
    public function handle($request, Closure $next)
    {
        $choosenLang = Session::get('locale');
        
        if (!$choosenLang)
        {
            $choosenLang = \App::getLocale();
            Session::put('locale', $choosenLang);
        }
        
        app()->setLocale($choosenLang);
        return $next($request);
    }
}
