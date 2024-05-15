<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Movies;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // melihat data yg masuk cmn debugging aja
        // dd(auth()->user());
        $movies = Movies::orderBy('featured', 'DESC')->orderBy('created_at', 'DESC')->get();
        return view('member.dashboard', ['movies' => $movies]);
    }
}
