<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rate;
use Illuminate\Http\Request;

class RateController extends Controller
{
    public function index()
    {
        $rateData = Rate::with('rateToProvider')->paginate(20);
        return view('admin.rates.index', ['rate' => $rateData]);
    }
}
