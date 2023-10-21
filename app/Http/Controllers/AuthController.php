<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'firstnames' => 'required|string|max:255',
            'lastnames' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        $user = new User([
            'first_names' => $request->firstnames,
            'last_names' => $request->lastnames,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role' => UserRole::ADMIN,
        ]);

        $user->save();

        return redirect()->route('index')->with('success', 'User successfully created!');
    }

    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {

            return redirect()->intended('/dashboard');;
        }

        return back()->withInput()->withErrors(['errors' => 'Bad credentials']);;
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
