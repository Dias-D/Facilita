<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function edit()
    {
        if (!Auth::check()) {
            return redirect('/')->withErrors(['error' => 'The provided credentials do not match our records.']);
        }

        return view('user.update', ['user' => auth()->user()]);
    }

    public function register(RegisterRequest $request)
    {
        $user = User::create($request->validated());

        auth()->login($user);

        return redirect('/dashboard')->with('success', "Account successfully registered.");
    }

    public function registration()
    {
        return view('user.register');
    }
}
