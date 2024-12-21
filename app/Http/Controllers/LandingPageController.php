<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use App\Models\Provider;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Models\Transaction;
use App\Traits\CustomEncrypt;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

class LandingPageController extends Controller
{
    use CustomEncrypt;
    public function index()
    {
        $providerRate = Rate::with('rateToProvider:id,provider_name')->select('id', 'provider_id', 'rate_value')->get();
        return \view('landing-page', ['provider' => $providerRate]);
    }

    public function tukarSekarang()
    {
        $provider = Provider::with('rateToTransaction')->get();
        return \view('tukar-provider', ['provider' => $provider]);
    }

    public function tukarSekarangProcess($id)
    {
        $provider = Provider::with('rateToTransaction')
            ->where('id', $this->decryptData($id))
            ->firstOrFail();
        $payment = PaymentMethod::toBase()->get();
        $bbClaim = env('BB_CLAIM');
        return view('tukar', [
            'provider' => $provider,
            'payment' => $payment,
            'bbclaim' => $bbClaim,
        ]);
    }

    public function getRate(Request $request)
    {
        $rate = Rate::where('provider_id', $request->pr)->first();

        return response()->json(['success' => true, 'data' => $rate ? $rate->rate_value : 0], 200);
    }

    public function process(Request $request)
    {
        //ambil rate
        $rate = Rate::where('provider_id', $request->provider)->firstOrFail();
        $pulseAmount = $request->pulse_amount;

        $resultAmount = $pulseAmount * $rate->rate_value;

        $transactionNumber = '#' . Str::random(7) . date('is');

        $query = Transaction::create([
            'transaction_number' => $transactionNumber,
            'provider_id' => $request->provider,
            'rate' => $rate->rate_value,
            'phone_number' => $request->phone_number,
            'pulse_amount' => $pulseAmount,
            'total_pulse' => $resultAmount,
            'payment_id' => $request->payment,
            'payment_name' => $request->payment_name,
            'account_name' => $request->account_name,
            'transaction_date' => Carbon::now(),
            'status_transaction' => 0,
        ]);

        $queryPesan = Transaction::with(['transactionToProvider:id,provider_name', 'transactionToPayment:id,name'])->find($query->id);
        $waNumber = \env('WA_NUMBER');
        $url = 'https://api.whatsapp.com/send/?phone=' . $waNumber . '&text=' . urlencode(
            "Halo admin, saya ingin convert pulsa dengan detail:\n\n" .
                "- TRID: " . $queryPesan->transaction_number . "\n" .
                "- Item: CONVERT PULSA " . $queryPesan->transactionToProvider->provider_name . "\n" .
                "- Nominal: Rp " . $queryPesan->pulse_amount . "\n" .
                "- No. Pengirim: " . $queryPesan->phone_number . "\n" .
                "- Saldo Didapat: Rp " . $queryPesan->total_pulse . "\n" .
                "- Bank/E-Wallet Tujuan: " . $queryPesan->transactionToPayment->name . "\n" .
                "- No. Rekening/E-Wallet: " . $queryPesan->payment_name . "\n" .
                "- Atas Nama: " . $queryPesan->account_name
        ) . '&type=phone_number&app_absent=0';
        // $url = 'https://api.whatsapp.com/send/?phone=6289&text=Halo+admin%2C+saya+ingin+convert+pulsa+denga+detail%3A%0A%0A-+TRID%3A+' . $queryPesan->transaction_number . '%0A-+Item%3A+CONVERT+PULSA+' . $queryPesan->transactionToProvider->provider_name . '%0A-+Nominal%3A+Rp+' . $queryPesan->pulse_amount . '%0A-+No.+Pengirim%3A+' . $queryPesan->phone_number . '%0A-+Saldo+Didapat%3A+Rp+' . $queryPesan->total_pulse . '-+Bank%2FE-Wallet+Tujuan%3A+' . $queryPesan->transactionToPayment->name . '%0A-+No.+Rekening%2FE-Wallet%3A+' . $queryPesan->payment_name . '-+Atas+Nama%3A+' . $queryPesan->account_name . '&type=phone_number&app_absent=0';

        return Redirect::to($url);
    }
}
