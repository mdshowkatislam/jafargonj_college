<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CitizenCharter;

class CitizenCharterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //dd("index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // dd("create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd('store');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //dd('show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $id = 1;
        $singleData = CitizenCharter::find($id);
        return view('backend.citizen_charter.add', compact('singleData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = 1;

        $request->validate([
            'title' => 'required',
            'file_path' => 'required|mimes:pdf'

        ]);
        // dd($request);
        $data = CitizenCharter::find($id);

        $data->title = $request->title;
        $data->file_path = $request->file_path;


        if ($request->hasfile('file_path')) {
            //dd($request->file('file_path'));
            $file = $request->file('file_path');
            $name = time() . rand(1, 100) . '.' . $file->extension();
            if ($file->move(public_path('upload/citizen_charter'), $name)) {
                $data->file_path = $name;
            }
        }
        // dd($data);
        $data->update();
        return redirect()->back()->with('success', 'file added');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
