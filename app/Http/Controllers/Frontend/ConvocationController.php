<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

use App\Models\Convocation;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ConvocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['convocations'] = Convocation::where('data9', $request->title)->where('status', '1')->first();
        $id                   = '1'.$data['convocations']->id;
        $data['notice']       = News::where('category', $id)->where('type', '3')->orderBy('date', 'desc')->get();
        return view('frontend.convocation.index', $data);
    }

}