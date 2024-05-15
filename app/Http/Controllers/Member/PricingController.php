<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    public function index()
    {
        // ini bagus ambil 1 row saja
        $standartPackage = Package::where('name', 'standart')->first();
        $goldPackage = Package::where('name', 'gold')->first();
        return view('member.pricing', [
            'standart' => $standartPackage,
            'gold' => $goldPackage,
        ]);
    }
}
