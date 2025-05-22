<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginSubmit(Request $request)
    {
        $data = $request->only('email', 'password');

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(Auth::attempt($data)) {
            $request->session()->regenerate();
            $user = Auth::user();
            if($user->is_admin) {
                return redirect()->route('index.admin');
            }
            return redirect()->route('index.store');
        } else {
            return redirect()->back()->with('failed', 'Email atau Password anda salah!');
        }
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerSubmit(Request $request)
    {
        $validate = $request->validate([
            'profile' => 'nullable|image|mimes:png,jpg,jpeg|max:2024',
            'username' => 'required|string',
            'email' => 'required|email',
            'telepon' => 'required',
            'password' => 'required|min:3',
        ]);

        if($request->hasFile('profile')) {
            $image = $request->file('profile')->store('profile', 'public');
        } else {
            $image = null;
        }

        User::create([
            'profile' => $image,
            'username' => $validate['username'],
            'email' => $validate['email'],
            'telepon' => $validate['telepon'],
            'password' => bcrypt($validate['password']),
        ]);

        return redirect()->route('login')->with('success', 'Akun berhasil di buat!');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
