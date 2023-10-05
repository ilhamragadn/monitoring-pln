<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     */
    public function __invoke(Request $request)
    {
        // return $request->user()->hasVerifiedEmail()
        //     ? redirect()->intended(RouteServiceProvider::HOME)
        //     : view('auth.verify-email');

        if (!$request->user()->hasVerifiedEmail()) {
            return view('auth.verify-email');
        } elseif ($request->user()->hasVerifiedEmail()) {
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
        }
    }
}
