<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class LogController extends Controller
{
    public function index()
    {
        $data['logs'] = Log::latest()->get();
        return view('backend.logs.view', $data);
    }
    public function dateWiseLogs(Request $request)
    {
        $data['from_date'] = $request->input('from_date');

        $data['to_date'] = $request->input('to_date');

        // Convert the form input to Carbon instances and set the time part.

        $from_date = Carbon::createFromFormat('Y-m-d', $data['from_date'])->startOfDay();
        $to_date = Carbon::createFromFormat('Y-m-d', $data['to_date'])->endOfDay();





        $data['logs'] = Log::whereBetween('created_at', [$from_date, $to_date])->get();

        return view('backend.logs.view', $data);
    }
}
