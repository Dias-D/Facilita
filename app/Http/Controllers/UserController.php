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
        return view('user.edit', ['user' => auth()->user()]);
    }

    public function register(RegisterRequest $request)
    {
        $user = User::create($request->validated());

        auth()->login($user);

        return redirect('/dashboard')->with('success', "Usuário criado com sucesso.");
    }

    public function registration()
    {
        return view('user.register');
    }

    public function update(UpdateUserRequest $request)
    {
        $validated = $request->validated();

        $user = Auth::user();

        $user->update($validated);

        return redirect('/dashboard')->with('success', "Usuário atualizado com sucesso.");
    }
}
