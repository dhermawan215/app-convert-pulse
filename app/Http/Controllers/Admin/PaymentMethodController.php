<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Traits\CustomEncrypt;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PaymentMethodController extends Controller
{
    use CustomEncrypt;

    public function index()
    {
        return \view('admin.payment.index');
    }

    public function list(Request $request)
    {
        $draw = $request['draw'];
        $offset = $request['start'] ? $request['start'] : 0;
        $limit = $request['length'] ? $request['length'] : 15;
        $globalSearch = $request['search']['value'];

        $query = PaymentMethod::select('*');

        if ($globalSearch) {
            $query->where('name', 'like', '%' . $globalSearch . '%');
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
            $data['name'] = $value->name;
            $data['action'] = '<button onclick="modal_edit_data.showModal()" class="btn-edits text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" data-dt="' . $this->encryptData($value->id) . '">Edit</button>';
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

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:100',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 403);
        }
        $user = Auth::user();

        try {
            PaymentMethod::create([
                'name' => $request->name,
                'created_by' => $user->name,
            ]);
            return response()->json(['success' => true, 'message' => 'Data saved!'], 200);
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => 'Error'], 500);
        }
    }

    public function info(Request $request)
    {
        $id = $this->decryptData($request->dvx);
        try {
            $query = PaymentMethod::find($id);
            $resposnse = [
                'name' => $query ? $query->name : null,
            ];
            return response()->json(['success' => true, 'data' => $resposnse], 200);
        } catch (\Throwable $th) {
            return response()->json(['success' => true, 'data' => null], 500);
        }
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:100',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 403);
        }

        try {
            $query = PaymentMethod::find($this->decryptData($request->svx));
            $query->update([
                'name' => $request->name,
            ]);
            return response()->json(['success' => true, 'message' => 'Update success'], 200);
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => 'Error'], 500);
        }
    }

    public function destroy(Request $request)
    {
        $ids = $request->dValue;
        try {
            PaymentMethod::whereIn('id', $ids)->delete();
            return response()->json(['success' => true, 'message' => 'Success!'], 200);
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => 'Error'], 500);
        }
    }
}
