<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        if ($request->expectsJson()) {
            $response['status'] = false;
            $response['status'] = 'Something went wrong ! Try again';
            return response()->json($response, 200);         
        }
  
        return route('login');
    }
}
