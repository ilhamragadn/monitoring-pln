<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            $roles = Auth::user()->role;
            switch ($roles) {
                case "Manager Perencanaan":
                    return redirect()->intended('/dashboard-mngr-ren' . '?verified=1');
                case "Manager Unit":
                    return redirect()->intended('/dashboard-mngr-unit' . '?verified=1');
                case "TL Rensis":
                    return redirect()->intended('/dashboard-tl-rensis' . '?verified=1');
                case "TL Teknik":
                    return redirect()->intended('/dashboard-tl-teknik' . '?verified=1');
                case "Pegawai":
                    return redirect()->intended('/dashboard-pegawai' . '?verified=1');
                default:
                    return redirect()->intended('/unathorized');
            }

            //return redirect()->intended(RouteServiceProvider::HOME . '?verified=1');
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }
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
        //return redirect()->intended(RouteServiceProvider::HOME.'?verified=1');
    }
}
