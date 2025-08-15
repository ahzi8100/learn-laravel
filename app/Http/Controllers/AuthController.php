<?php

namespace App\Http\Controllers;

use App\Mail\LoginMail;
use Illuminate\Http\Request;
use App\Jobs\ProcessLoginMail;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            ProcessLoginMail::dispatch($request->user(), $request->ip(), now()->toDateTimeString(), $request->userAgent());

            // Mail::to($request->user())->send(new LoginMail($request->user(), $request->ip(), now()->toDateTimeString(), $request->userAgent()));

            return redirect()->intended('admin/blogs');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.'
        ]);
    }

    public function register()
    {
        return view('auth.register');
    }

    public function createUser(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::create($credentials);

        Auth::login($user);

        event(new Registered($user));

        return redirect()->route('blog.index')->with('success', 'You Account Registered Successfully!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
