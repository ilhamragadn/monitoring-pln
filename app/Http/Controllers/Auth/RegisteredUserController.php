<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'string', function ($attribute, $value, $fail) {
                $validRoles = ['Manager Perencanaan', 'Manager Unit', 'TL Rensis', 'TL Teknik', 'Pegawai'];
                if (!in_array($value, $validRoles)) {
                    $fail($attribute . ' is invalid.');
                }
            }],
            'ulp' => ['string']
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'ulp' => $request->ulp,
        ]);

        event(new Registered($user));

        Auth::login($user);
        //cek role
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
