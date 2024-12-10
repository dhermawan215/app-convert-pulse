<?php

namespace App\Http\Controllers\Admin;

use App\Models\Rate;
use App\Models\Provider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\CustomEncrypt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RateController extends Controller
{
    use CustomEncrypt;
    public function index()
    {
        return view('admin.rates.index');
    }

    public function list(Request $request)
    {
        $draw = $request['draw'];
        $offset = $request['start'] ? $request['start'] : 0;
        $limit = $request['length'] ? $request['length'] : 15;
        $globalSearch = $request['search']['value'];

        $query = Rate::with('rateToProvider:id,provider_name')->select('id', 'provider_id', 'rate_value');

        if ($globalSearch) {
            $query->where('rate_value', 'like', '%' . $globalSearch . '%')
                ->orWhereHas('rateToProvider', function ($q) use ($globalSearch) {
                    $q->where('provider_name', 'like', '%' . $globalSearch . '%');
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
            $data['cbox'] = '<input type="checkbox" class="data-menu-cbox" value="' . $value->id . '">';
            $data['rnum'] = $i;
            $data['provider'] = $value->rateToProvider ? $value->rateToProvider->provider_name : null;
            $data['rate'] = $value->rate_value;
            $data['action'] = '<a href="' . \route('rate_pricing.edit', $this->encryptData($value->id)) . '"  class="btn-edits text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit</a>';
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

    public function add()
    {
        $providers = Provider::toBase()->get();
        return \view('admin.rates.add', ['provider' => $providers]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'provider' => 'required',
            'rate' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 403);
        }
        $user = Auth::user();

        try {
            Rate::create([
                'provider_id' => $request->provider,
                'rate_value' => $request->rate,
                'created_by' => $user->name,
            ]);
            return response()->json(['success' => true, 'message' => 'Data saved!', 'url' => \route('rate_pricing')], 200);
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => 'Error'], 500);
        }
    }

    public function edit($id)
    {
        $data = Rate::with('rateToProvider')->where('id', $this->decryptData($id))->firstOrFail();
        $providers = Provider::toBase()->get();
        return \view('admin.rates.edit', ['provider' => $providers, 'data' => $data, 'id' => $id]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'provider' => 'required',
            'rate' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 403);
        }

        try {
            $query = Rate::find($this->decryptData($request->dsx));
            $query->update([
                'provider_id' => $request->provider,
                'rate_value' => $request->rate,
            ]);
            return response()->json(['success' => true, 'message' => 'Data updated!', 'url' => \route('rate_pricing')], 200);
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => 'Error'], 500);
        }
    }

    public function destroy(Request $request)
    {
        $ids = $request->dValue;
        try {
            Rate::whereIn('id', $ids)->delete();
            return response()->json(['success' => true, 'message' => 'Success!'], 200);
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => 'Error'], 500);
        }
    }
}
