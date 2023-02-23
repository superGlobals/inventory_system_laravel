<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(UserRequest $request)
    {
        $user = new User;

        $hash = bcrypt($request->password);

        $user->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $hash,
        ]);

        return to_route('login')->with('message', 'Account Created Successfully');
    }

    public function authentication(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('dashboard')->with('message', 'Login Successfully');
        }

        return back()->withErrors([
            'email' => 'Invalid Credentials'
        ])->onlyInput('email');
    }

     public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('message', 'Logout Successfully');
    }
}
