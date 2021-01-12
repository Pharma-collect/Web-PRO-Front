<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Namshi\JOSE\SimpleJWS;

class TokenValidity
{
    public function handle(Request $request, Closure $next)
    {
       if(session("token")){
           $jws = SimpleJWS::load(session("token"));

           if(!$jws->isValid(env('JWT_SECRET'))){
               session()->flush();

               return redirect('/connexion');
           }

           return $next($request);
       } else {
           session()->flush();

           return redirect('/connexion');
       }
    }
}
