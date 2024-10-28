<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Plan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {



        if (Auth::guard('web')->check() && Auth::user()['role'] == 'company') {

            $user = User::find(Auth::user()['id']);
            if ($user['activate_plan_id'] == '') {
                return redirect('company/priceing');

            } else {
                return $next($request);

            }



        } else {
            return redirect('company/login');
        }
    }
}
