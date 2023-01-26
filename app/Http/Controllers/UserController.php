<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function edit()
    {
        if (!Auth::check()) {
            return redirect('/')->withErrors(['error' => 'The provided credentials do not match our records.']);
        }

        return view('user.edit', ['user' => auth()->user()]);
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

    public function update(UpdateUserRequest $request)
    {
        $request->validated();

        $user = Auth::user();

        if ($request->input('name'))
            $user->name = $request->input('name');

        if ($request->input('email'))
            $user->email = $request->input('email');

        $user->save();

        return redirect('/dashboard')->with('success', "Account successfully registered.");
    }
}
