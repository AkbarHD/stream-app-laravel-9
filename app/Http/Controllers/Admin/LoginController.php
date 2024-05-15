<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // use auth

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.auth');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // jd sbrnya utk ngmabil smua data itu kalo otomatis tinggal
        // $credential = $request->all(); // dgn bgini data yg masuk sdh otomatis di tangkap oleh request->all()
        // $credentia = $request->except('_token');

        $credential = $request->only(['email', 'password']);
        $credential['role'] = 'admin'; // yg masuk hanya boleh admin

        if (Auth::attempt($credential)) {
            $request->session()->regenerate();

            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'error' => 'Email atau Password anda salah'
        ])->withInput();
        // dd($credential);
    }

    public function logout(Request $request)
    {
        Auth::logout(); // utk menghapus data user

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
