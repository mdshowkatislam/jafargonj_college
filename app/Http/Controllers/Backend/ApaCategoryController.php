<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ApaReport;
use App\Models\ApaCategory;

class ApaCategoryController extends Controller
{
    public function index()
    {
        $data['apa_category'] = ApaCategory::where('status', 1)->get();
        return view('backend.apa.category.view')->with($data);
    }

    public function add()
    {
        // $data['apa_category'] = ApaCategory::where('status', 1)->get();
        return view('backend.apa.category.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'required',
            'photo_image' => 'required|mimes:jpg,jpeg,png',
        ]);

        $data = new ApaCategory();
        $data->title = $request->title;
        $data->status = $request->status;

        $img = $request->file('photo_image');

        if ($img) {
            $imgName = date('Ymd') . '_' . time() . '.' . $img->getClientOriginalExtension();;
            $img->move('upload/apa_category/', $imgName);
            $data['image'] = $imgName;
        }

        $data->save();

        return redirect()->route('catagory.list')->with('success', 'Apa  category add Successfully');
    }

    public function edit($id)
    {
        $data['editData'] = ApaCategory::findOrFail($id);

        return view('backend.apa.category.create')->with($data);
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'required',
            'photo_image' => 'required|mimes:jpg,jpeg,png',
        ]);


        $data = ApaCategory::findOrFail($id);
        $data['title'] = $request->title;
        $data['status'] = $request->status;
        $img = $request->file('photo_image');

        if ($img) {
            $imgName = date('Ymd') . '_' . time() . '.' . $img->getClientOriginalExtension();;
            $img->move('upload/apa_category/', $imgName);
            $data['image'] = $imgName;
        }

        $data->save();
        return redirect()->route('catagory.list')->with('success', 'Apa category update Successfully');
    }

    public function destroy(Request $request)
    {
        $data = ApaCategory::find($request->id);
        $data->delete();
        return redirect()->back();
    }
}
