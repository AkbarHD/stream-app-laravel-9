<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('member.auth');
    }

    public function auth(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $credentials = $request->only(['email', 'password']); // -> hnya email dan password
        $credentials['role'] = 'member'; // yg boleh masuk yg member

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('member.dashboard');
        }

        // jika gagal
        return back()->withErrors([
            'credentials' => 'Email atau Password Salah'
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('member.login');
    }
}
