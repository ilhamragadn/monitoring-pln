<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
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

        $request->user()->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }
}
