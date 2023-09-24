<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserTypeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (Response) $next
     * @param $type
     * @return Response
     */
    public function handle(Request $request, Closure $next, $type): Response
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        if (Auth::user()->user_type !== $type) {
            if (Auth::user()->user_type === 'innovate') {
                return redirect('innovate-dashboard'); // Redirect to a different page for 'innovate' users
            }
            return redirect('/');
        }

        return $next($request);
    }

}
