<?php

namespace App\Http\Controllers\Admin;

use App\Models\Provider;
use Illuminate\Http\Request;
use App\Traits\CustomEncrypt;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProviderController extends Controller
{
    use CustomEncrypt;

    public function index()
    {
        return \view('admin.provider.index');
    }

    public function list(Request $request)
    {
        $draw = $request['draw'];
        $offset = $request['start'] ? $request['start'] : 0;
        $limit = $request['length'] ? $request['length'] : 15;
        $globalSearch = $request['search']['value'];

        $query = Provider::select('*');

        if ($globalSearch) {
            $query->where('provider_name', 'like', '%' . $globalSearch . '%');
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
            $data['provider_name'] = $value->provider_name;
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
            'provider_name' => 'required|max:100',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 403);
        }
        $user = Auth::user();

        try {
            Provider::create([
                'provider_name' => $request->provider_name,
                'created_by' => $user->name,
            ]);
            return response()->json(['success' => true, 'message' => 'Data saved!'], 200);
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => 'Error'], 500);
        }
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'provider_name' => 'required|max:100',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 403);
        }

        try {
            $query = Provider::find($this->decryptData($request->svx));
            $query->update([
                'provider_name' => $request->provider_name,
            ]);
            return response()->json(['success' => true, 'message' => 'Update success'], 200);
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => 'Error'], 500);
        }
    }

    public function info(Request $request)
    {
        $id = $this->decryptData($request->dvx);
        try {
            $query = Provider::find($id);
            $resposnse = [
                'provider_name' => $query ? $query->provider_name : null,
            ];
            return response()->json(['success' => true, 'data' => $resposnse], 200);
        } catch (\Throwable $th) {
            return response()->json(['success' => true, 'data' => null], 500);
        }
    }

    public function destroy(Request $request)
    {
        $ids = $request->dValue;
        try {
            Provider::whereIn('id', $ids)->delete();
            return response()->json(['success' => true, 'message' => 'Success!'], 200);
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => 'Error'], 500);
        }
    }
}
