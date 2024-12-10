<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod;
use App\Models\Provider;
use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $provider = Provider::count();
        $payment = PaymentMethod::count();
        $transactionPending = Transaction::where('status_transaction', 0)->count();
        $transactionSuccess = Transaction::where('status_transaction', 1)->count();
        $transactionFail = Transaction::where('status_transaction', 2)->count();
        return \view('dashboard', [
            'providerCount' => $provider,
            'paymentCount' => $payment,
            'transactionSuccess' => $transactionSuccess,
            'transactionPending' => $transactionPending,
            'transactionFail' => $transactionFail,
        ]);
    }
}
