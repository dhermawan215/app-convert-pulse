<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function index()
    {
        $providerData = Provider::paginate(20);
        return \view('admin.provider.index', ['provider' => $providerData]);
    }
}
