<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            if(Request::is('Admin/*')) //in url Admin/any thing go to back [page login] go to login admin must been authintication 
                return route('get.login.admin');
            else
                return route('login'); //i want make route users go to user okay bro
        }
    }
}
