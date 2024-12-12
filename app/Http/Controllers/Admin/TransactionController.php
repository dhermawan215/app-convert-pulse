<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Traits\CustomEncrypt;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    use CustomEncrypt;
    public function index()
    {
        return \view('admin.transaction.index');
    }

    public function list(Request $request)
    {
        $draw = $request['draw'];
        $offset = $request['start'] ? $request['start'] : 0;
        $limit = $request['length'] ? $request['length'] : 15;
        $globalSearch = $request['search']['value'];

        $query = Transaction::with(['transactionToProvider:id,provider_name', 'transactionToPayment:id,name'])->select('*');

        if ($globalSearch) {
            $query->where('transaction_number', 'like', '%' . $globalSearch . '%')
                ->orWhere('phone_number', 'like', '%' . $globalSearch . '%')
                ->orWhereDate('transaction_date', 'like', '%' . $globalSearch . '%')
                ->orWhereHas('transactionToProvider', function ($q) use ($globalSearch) {
                    $q->where('provider_name', 'like', '%' . $globalSearch . '%');
                })->orWhereHas('transactionToPayment', function ($q) use ($globalSearch) {
                    $q->where('name', 'like', '%' . $globalSearch . '%');
                });
        }

        $recordsFiltered = $query->count();

        $resData = $query->skip($offset)
            ->take($limit)
            ->get();

        $recordsTotal = $resData->count();

        $data = [];
        $i = $offset + 1;
        $arr = [];

        foreach ($resData as $key => $value) {
            $data['rnum'] = $i;
            $data['id'] = $value->transaction_number;
            $data['provider'] = $value->transactionToProvider->provider_name;
            $data['rate'] = $value->rate;
            $data['pulse_amount'] = 'Rp.' . \number_format($value->pulse_amount, 0, ',', '.');
            $data['total_pulse'] = 'Rp.' . \number_format($value->total_pulse, 0, ',', '.');
            $data['payment'] = $value->transactionToPayment->name;
            $data['acount_number'] = $value->payment_name;
            $data['acount_name'] = $value->account_name;
            $data['date'] = Carbon::parse($value->transaction_date)->toFormattedDateString();

            if ($value->status_transaction == 1) {
                $status = '<span style="color:#34eb4c">Success</span>';
            } elseif ($value->status_transaction == 2) {
                $status = '<span style="color:#eb5834">Cancel</span>';
            } else {
                $status = '<span style="color:#34bdeb">Pending</span>';
            }
            $data['status'] = $status;
            $data['action'] = '<button class="btn-chg" onclick="modal_change.showModal()" style="background:#349beb; color:#fff; border-radius:5px" data-button=' . $this->encryptData($value->id) . '>Change status</button>';
            $arr[] = $data;
            $i++;
        }

        return \response()->json([
            'draw' => $draw,
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $arr,
        ]);
    }

    public function status(Request $request)
    {
        $query = Transaction::select('status_transaction')->where('id', $this->decryptData($request->qx))->first();

        return \response()->json(['success' => \true, 'data' => $query ? (string) $query->status_transaction : null], 200);
    }
    public function change(Request $request)
    {
        $query = Transaction::where('id', $this->decryptData($request->qx));
        try {
            $query->update([
                'status_transaction' => $request->sts
            ]);
            return \response()->json(['success' => \true, 'message' => 'change status success'], 200);
        } catch (\Throwable $th) {
            return \response()->json(['success' => \false, 'message' => 'error'], 500);
        }
    }
}
