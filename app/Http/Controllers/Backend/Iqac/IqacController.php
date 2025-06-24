<?php

namespace App\Http\Controllers\Backend\Iqac;

use App\Http\Controllers\Controller;
use App\Models\Office;
use Illuminate\Http\Request;

class IqacController extends Controller
{
    public function index()
    {
        $data['office'] = Office::where('name', 'like', '%iqac%')->first();
        return view('backend.iqac.view', $data);
    }
}
