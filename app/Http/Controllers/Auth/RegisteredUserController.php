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
use Illuminate\View\View;
use App\Models\client;
use App\Models\admin;
use App\Models\Organiser;


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
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);

        if ($request->role == 'Client') {
            client::create(['user_id' => $user->id]);
        } elseif ($request->role == 'Organizer') {
            Organiser::create(['user_id' => $user->id]);
        } elseif ($request->role == 'Admin') {
            admin::create(['user_id' => $user->id]);
        }

        if ($user->role == 'Client') {
            Auth::login($user);
            return redirect('/');
        } elseif ($user->role == 'Organizer') {
            Auth::login($user);
            return redirect('/dashboardorganiser');
        } elseif ($user->role == 'Admin') {
            Auth::login($user);
            return redirect('/dashboard');
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
