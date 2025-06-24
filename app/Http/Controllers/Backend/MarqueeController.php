<?php

namespace App\Http\Controllers\Backend;

use App\Models\Marquee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MarqueeController extends Controller
{
    public function index()
    {
        $data['marquees'] = Marquee::latest()->get();

        return view('backend.marquee.index', $data);
    }
    public function add()
    {
        return view('backend.marquee.add');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string'],
            'status' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'sort_order' => 'required',
        ]);
        Marquee::create($request->all());

        return redirect()->route('marquee.list')->with('success', 'Add Successfully');

    }
    public function edit($id = Null)
    {
        $singleData = Marquee::find($id);
        return view('backend.marquee.add', compact('singleData'));

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'string'],
            'status' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'sort_order' => 'required',
        ]);
        
        $marquee = Marquee::find($id);
        $data = $request->all();
        $marquee->update($data);

        return redirect()->route('marquee.list')->with('success', 'update Successfully');
    }
    public function delete(Request $request)
    {
        $data = Marquee::find($request->id);

        $data->delete();
        return redirect()->back();
    }
}
