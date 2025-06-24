<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ApaReport;
use App\Models\ApaCategory;

class ApaReportController extends Controller
{
    public function index($category_id)
    {

        $data['apa_report'] = ApaReport::with('getCategory')->where('apa_category_id', $category_id)->where('status', 1)->get();
        $data['apa_category'] = ApaCategory::find($category_id);
        return view('backend.apa.report.view')->with($data);
    }

    public function add($category_id)
    {
        $data['apa_category'] = ApaCategory::find($category_id);
        $data['apa_report'] = ApaReport::with('getCategory')->where('apa_category_id', $category_id)->where('status', 1)->get();
        // dd($data['apa_report'][0]->getCategory->title);
        return view('backend.apa.report.create')->with($data);
    }

    public function store(Request $request, $category_id)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'required',
            'link' => 'required|url',
            'publish_date' => 'required|date',

        ]);


        $data = new ApaReport();
        $data->apa_category_id = $request->apa_category_id;
        $data->title = $request->title;
        $data->status = $request->status;
        $data->url = $request->link;
        $data->publish_date = $request->publish_date;

        $data->save();

        return redirect()->route('report.list', $category_id)->with('success', 'Apa Report added Successfully');
    }

    public function edit($category_id, $id)
    {
        $data['editData'] = ApaReport::findOrFail($id);
        $data['apa_category'] = ApaCategory::where('id', $category_id)->first();
        return view('backend.apa.report.create')->with($data);
    }

    public function update(Request $request, $category_id, $id)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'required',
            'link' => 'required|url',
            'publish_date' => 'required|date',
        ]);

        $data = ApaReport::findOrFail($id);
        $data->title = $request->title;
        $data->status = $request->status;
        $data->url = $request->link;
        $data->publish_date = $request->publish_date;
        $data->update();
        
        return redirect()->route('report.list', $data->apa_category_id)->with('success', 'Apa Report updated Successfully');
    }

    public function destroy(Request $request)
    {
        $data = ApaReport::find($request->id);
        $data->delete();
        return redirect()->back();
        // return redirect()->route('report.list')->with('success', 'Apa Report delete Successfully');
    }
}
