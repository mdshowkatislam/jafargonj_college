<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Models\Convocation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ConvocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $convocations = Convocation::orderBy('id', 'desc')->get();
        return view('backend.convocation.index')->with('convocations', $convocations);
    }

    public function add()
    {
        $convocations = Convocation::all();
        return view('backend.convocation.add')->with('convocations', $convocations);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
          'title' => 'nullable|string|max:255',
          'short_description' => 'nullable|string|max:255',
          'long_description' => 'nullable|string',
          'data1' => 'nullable|string',
          'data2' => 'nullable|string',
          'data3' => 'nullable|string',
          'data4' => 'nullable|string',
          'data5' => 'nullable|string',
          'data6' => 'nullable|string',
          'data7' => 'nullable|string',
          'data8' => 'nullable|string',
          'data9' => 'nullable|string',
          'status' => 'nullable|string|max:1',
          'registration_status' => 'nullable|string|max:1',
          'registration_link' => 'nullable|string',
        ]);

        $slug  = Str::slug($request->title);

        if ($request->hasFile('data10')) {
          // Handle file upload
          $file = $request->file('data10');
          $filename = now()->format('YmdHis') . '_' . \Str::random(10) . '.' . $file->getClientOriginalExtension();
  
          // Move the file to the public/uploads directory
          $file->move(public_path('uploads'), $filename);
  
          // Update the validated array with the new filename
          $validated['data10'] = $filename;
      }

      $validated['data9'] = $slug;
  
      Convocation::create($validated);

      return redirect()->route('news.convocation.list')->with('success', 'Convocation created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $convocation = Convocation::findOrFail($id);
        return view('backend.convocation.add')->with('convocation', $convocation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

      $validated = $request->validate([
        'title' => 'nullable|string|max:255',
        'short_description' => 'nullable|string|max:255',
        'long_description' => 'nullable|string',
        'data1' => 'nullable|string',
        'data2' => 'nullable|string',
        'data3' => 'nullable|string',
        'data4' => 'nullable|string',
        'data5' => 'nullable|string',
        'data6' => 'nullable|string',
        'data7' => 'nullable|string',
        'data8' => 'nullable|string',
        'data9' => 'nullable|string',
        'status' => 'nullable|string|max:1',
        'registration_status' => 'nullable|string|max:1',
        'registration_link' => 'nullable|string',
    ]);

    $convocation = Convocation::findOrFail($id);

    $slug  = Str::slug($request->title);

    if ($request->hasFile('data10')) {
        // Handle file upload
        $file = $request->file('data10');
        $filename = now()->format('YmdHis') . '_' . \Str::random(10) . '.' . $file->getClientOriginalExtension();

        // Move the file to the public/uploads directory
        $file->move(public_path('uploads'), $filename);

        // Delete the old file if it exists
        if ($convocation->data10 && file_exists(public_path('uploads/' . $convocation->data10))) {
            unlink(public_path('uploads/' . $convocation->data10));
        }

        // Update the validated array with the new filename
        $validated['data10'] = $filename;
    }

      $validated['data9'] = $slug;

      $convocation->update($validated);

      return redirect()->route('news.convocation.list')->with('success', 'Convocation updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $convocation = Convocation::findOrFail($id);
        $convocation->delete();

        return redirect()->route('news.convocation.list')->with('success', 'Convocation deleted successfully');
    }
}
