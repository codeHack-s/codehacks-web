<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(Request $request, $type = null): View
    {
        if ($type === 'campus') {
            return view('auth.register');
        } elseif ($type === 'innovate') {
            return view('auth.register-innovate');
        } else {
            return view('auth.select-account-type');
        }
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone_number' => ['nullable', 'string', 'max:255'],
        ]);

        $contact = $request->contact;

        //remove the first character if it's a '+'
        if (str_starts_with($contact, '+')) {
            $contact = substr($contact, 1);
        }

        //dd($contact);

        // Check if the first character of the string is '0'
        if (str_starts_with($contact, '0')) {
            // Replace the first character '0' with '254'
            $contact = '254' . substr($contact, 1);
        }

        $request->merge(['contact' => $contact]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone_number,
        ]);

        event(new Registered($user));

        Auth::login($user);
        Auth::user()->update(['last_login_at' => now()]);

        // Send verification email
        if(!$user->hasVerifiedEmail()) {
            $user->sendEmailVerificationNotification();
        }

        return redirect()->route('verification.notice');
    }
}
