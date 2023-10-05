<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();
        $roles = Auth::user()->role;
        switch ($roles) {
            case "Manager Perencanaan":
                return redirect()->intended('/dashboard-mngr-ren');
            case "Manager Unit":
                return redirect()->intended('/dashboard-mngr-unit');
            case "TL Rensis":
                return redirect()->intended('/dashboard-tl-rensis');
            case "TL Teknik":
                return redirect()->intended('/dashboard-tl-teknik');
            case "Pegawai":
                return redirect()->intended('/dashboard-pegawai');
            default:
                return redirect()->intended('/unathorized');
        }

        //return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
