<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\UserPremium;
use Illuminate\Http\Request;

class UserPremiumController extends Controller
{
    public function index()
    {
        $userId = auth()->user()->id;
        // where itu utk pencegahan sekaligus ambil data berdasarkan id yg masuk 
        // karena kalo gada user_id si ujang bisa akses juga pdhl dia blm subscrib, makanya kita ambil data 1 row berdasarkan id yg masuk
        $userPremium = UserPremium::with('package')->where('user_id', $userId)->first(); // cari userPremium brsma package, yg id nya id yg masuk

        // subscription ini kan harus subscribe dlu (checkout)
        if (!$userPremium) { // jika dia blm subscribe maka pindahkan halaman ke pricing
            return redirect()->route('pricing');
        }

        // jika sudah maka kita arahkan ke
        return view('member.subscription', ['user_premium' => $userPremium]);
    }
}
