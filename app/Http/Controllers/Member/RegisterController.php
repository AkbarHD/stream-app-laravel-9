<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // user Hash

class RegisterController extends Controller
{
    public function index()
    {
        return view('member.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone_number' => 'required|numeric',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        $data = $request->except("_token"); // ambil smua data kecuali token

        // utk pencegahan email duplicate sbnrnya bsa di lakukan di validate
        $isEmailExist = User::where('email', $request->email)->exists(); // apakah email yang database yg diketian sama user sama?
        if ($isEmailExist) { // jika sama
            return back()->withErrors([ // maka tampilkan pesan
                'email' => "This email already exist",
            ])->withInput();
        }

        $data['role'] = 'member'; // kita paksa dia menjadi member
        $data['password'] = Hash::make($request->password);

        User::create($data);

        return redirect()->route('member.login');
    }
}
