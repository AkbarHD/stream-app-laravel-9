<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction; // models transaction
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with(['Package', 'User'])->get();
        return view('admin.transaction', ['transactions' => $transactions]);
    }
}
