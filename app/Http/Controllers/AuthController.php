<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Auth;
use App\Models\Authuser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class AuthController extends Controller
{
    public function login()
    {
        return view('welcome');
    }

    public function postlogin(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|',
            'password' => 'required|string|min:6',
        ]);

        $cekuser = Authuser::where('username', $request->username)->first();
        if ($cekuser == null) {
            return redirect()->back()->with('error', 'Invalid login details');
        }

        if (FacadesAuth::attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->intended('/dashboard');
        } else {
            return back()->withErrors(['username' => 'Email atau password salah']);
        }
        
    }

    public function logout()
    {
        FacadesAuth::logout();
        return view('welcome');
    }

    public function register(Request $request)
    {
        return view('register');
    }

    public function postRegister(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:6|',
        ]);

        $user = new Authuser();
        $user->nama_user = $request->nama;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->level = 2;
        $user->save();

        return redirect()->route('login')->with('success', 'Registration successful. Please login.');
    }

}
