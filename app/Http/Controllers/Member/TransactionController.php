<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Str; // import utk class string random

class TransactionController extends Controller
{
    public function store(Request $request)
    {
        // utk ngetest aja...
        // dd($request->all());
        // return "Pembayaran success";

        // jd di package->id ini akan mendapatkan 1 row dari table package, ini harus berdsarkan id, karena kita find
        $package = Package::find($request->package_id);

        // dd($package);

        $customer = auth()->user();

        // dd($customer);

        // ketika kita pncet subscribnow maka ini akan otomatis ke buat dan masuk ke database lalu di tampilkan di admin transaction
        $transaction = Transaction::create([
            // package_id, user_id dll itu harus samakan dgn field DB
            'package_id' => $package->id, // utk mndapatkan gold or standart // jd karna package id itu bigInt isinya harus angka
            'user_id' => $customer->id, // utk mendapatkan id user bisa jg mnggunakan auth()->user()->id,
            'amount' => $package->price,
            'transaction_code' => strtoupper(Str::random(10)),
            'status' => 'pending'
        ]);

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        // KARENA PD SAAT MENGAMBIL YG DARI ENV MAKA HASILNYA BOOL KITA GAMAU KAYA GITU, KITA MAU HASILNYA STRING JD "TRUE" 
        \Midtrans\Config::$isProduction = (bool) env('MIDTRANS_IS_PRODUCTION');
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = (bool) env('MIDTRANS_IS_SANITIZED');
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = (bool) env('MIDTRANS_IS_3DS');

        // ini yg akan muncul di pembayaran midtrans 
        $params = array(
            'transaction_details' => array(
                'order_id' => $transaction->transaction_code,
                'gross_amount' => $transaction->amount,
            ),
            'customer_details' => array(
                'first_name' => $customer->name,
                'last_name' => $customer->name,
                'email' => $customer->email,
            ),
        );

        $createMidtransTransaction = \Midtrans\Snap::createTransaction($params);
        $midtransRedirectUrl = $createMidtransTransaction->redirect_url;
        return redirect($midtransRedirectUrl);
        // $snapToken = \Midtrans\Snap::getSnapToken($params);
    }
}
