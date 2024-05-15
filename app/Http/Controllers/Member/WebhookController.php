<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\UserPremium;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class WebhookController extends Controller
{
    //utk mengatur webhook
    public function handler(Request $request)
    {
        \Midtrans\Config::$isProduction = (bool) env('MIDTRANS_IS_PRODUCTION');
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        $notif = new \Midtrans\Notification();

        $transactionStatus = $notif->transaction_status;
        $transactionCode = $notif->order_id;
        $fraudStatus = $notif->fraud_status;

        $status = '';


        if ($transactionStatus == 'capture') {
            if ($fraudStatus == 'accept') {
                // TODO set transaction status on your database to 'success'
                // and response with 200 OK
                $status = 'success';
            }
        } else if ($transactionStatus == 'settlement') {
            // TODO set transaction status on your database to 'success'
            // and response with 200 OK
            $status = 'success';
        } else if (
            $transactionStatus == 'cancel' ||
            $transactionStatus == 'deny' ||
            $transactionStatus == 'expire'
        ) {
            // TODO set transaction status on your database to 'failure'
            // and response with 200 OK
            $status = 'failure';
        } else if ($transactionStatus == 'pending') {
            // TODO set transaction status on your database to 'pending' / waiting payment
            // and response with 200 OK
            $status = 'pending';
        }

        $transaction = Transaction::with('package')->where('transaction_code', $transactionCode)->first();

        if ($status === 'success') {

            //jika user sudah beli lalu ingin beli lagi
            $userPremium = UserPremium::where('user_id', $transaction->user_id)->first();

            if ($userPremium) {
                $endOfSubscription = $userPremium->end_of_subscription;
                $date = Carbon::createFromFormat('y-m-d', $endOfSubscription);
                $newEndSubscription = $date->addDays($transaction->Package->max_days)->format('Y-m-d');

                $userPremium->update([
                    'package_id' => $transaction->package_id,
                    'end_of_subscription' => $newEndSubscription,
                ]);
            } else {
                UserPremium::create([
                    'package_id' => $transaction->Package->id,
                    'user_id' => $transaction->User->id,
                    'end_of_subscription' => now()->addDays($transaction->Package->max_days)
                ]);
            }
        }

        $transaction->update(['status' => $status]);
    }
}
