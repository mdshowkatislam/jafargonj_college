<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PublicationStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublicationStatusController extends Controller
{
    public function index()
    {
        $data['publicationStatus'] = PublicationStatus::get();

        return view('backend.publication_status.view', $data);
    }

    public function add()
    {
    	return view('backend.publication_status.add');
    }

    public function store(Request $request)
    {
        //dd($request->all());

        $request->validate([
            'title' => 'required',
            'status' => 'required',
            'sort_order' => 'required | numeric',
        ]);

        DB::beginTransaction();
        try {
            $publication_status = new PublicationStatus();
            $publication_status->title = $request->title;
            $publication_status->status = $request->status;
            $publication_status->sort_order = $request->sort_order;
            $publication_status->save();
            DB::commit();
            return redirect()->route('news.publication_status')->with('success', 'Publication Status Added Successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('news.publication_status')->with('success', 'Something Went Wrong !');
        }
    }



    public function edit($id)
    {
        $data['editData'] = PublicationStatus::find($id);
        // dd($data['editData']);
        return view('backend.publication_status.edit', $data);

    }



    public function update(Request $request,$id)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'status' => 'required',
            'sort_order' => 'required | numeric',
        ]);

        DB::beginTransaction();
        try {
            $publication_status = PublicationStatus::findOrFail($id);
            $publication_status->title = $request->title;
            $publication_status->status = $request->status;
            $publication_status->sort_order = $request->sort_order;
            $publication_status->update();
            DB::commit();
            return redirect()->route('news.publication_status')->with('success', 'Publication Status Updated Successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('news.publication_status')->with('success', 'Something Went Wrong !');
        }

    }
}
