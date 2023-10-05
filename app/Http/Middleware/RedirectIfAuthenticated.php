<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $roles = Auth::user()->role;
                switch ($roles) {
                    case "Manager Perencanaan":
                        return redirect('/dashboard-mngr-ren');
                    case "Manager Unit":
                        return redirect('/dashboard-mngr-unit');
                    case "TL Rensis":
                        return redirect('/dashboard-tl-rensis');
                    case "TL Teknik":
                        return redirect('/dashboard-tl-teknik');
                    case "Pegawai":
                        return redirect('/dashboard-pegawai');
                    default:
                        return redirect('/unathorized');
                }
                //return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}
