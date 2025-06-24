<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Magazine;
use App\Services\MagazineService;

class MagazineController extends Controller
{
    //
    public function index()
    {

        $allData = MagazineService::List();
        return view('backend.magazin.index', compact('allData'));
    }
    public function add()
    {
        $data = [];
        return view('backend.magazin.add', $data);
    }
    public function store(Request $request, MagazineService $Magazine)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'], 'attachment' => 'nullable|mimes:pdf',
            'image' => 'nullable|image|mimes:jpg,jpeg,png'

        ]);
        $Magazine->saveEvent($request);
        return redirect()->route('news.magazine.list')->with('success', 'Magazine Added Successfully');
    }
    public function edit($id)
    {
        $data['editData'] = MagazineService::SingleData($id);
        return view('backend.magazin.add')->with($data);
    }

    public function update(Request $request, $id, MagazineService $Magazine)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'attachment' => 'nullable|mimes:pdf',
            'image' => 'nullable|image|mimes:jpg,jpeg,png'
        ]);
        //dd($request->all());
        $Magazine->updateEvent($request, $id);

        return redirect()->route('news.magazine.list')->with('info', 'Magazine Updated Successfully');
    }
    public function status_change(Request $request, MagazineService $Magazine)
    {
        $status_info = $Magazine->statusChangeEvent($request);

        if ($status_info->status == 1) {
            return response()->json(['status' => 1, 'message' => 'Active Successfully']);
        } else {
            return response()->json(['status' => 0, 'message' => 'Inactive Successfully']);
        }
    }
}
