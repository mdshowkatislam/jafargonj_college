<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\LandingModal; 
use App\Services\LandingModalService; 

class LandingModalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $allData = LandingModalService::LandingModalList();  
        return view('backend.landng_modal.index', compact('allData'));
    }
    public function addmodal()
    {  
        $data = [];
        return view('backend.landng_modal.add',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, LandingModalService $LandingModal)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'status' => 'required',
            'use_for' => 'required',
            'image' => ['mimes:jpg,png,jpeg', 'max:2048'],
        ]); 
        $LandingModal->saveEvent($request);
        return redirect()->route('landing-modal.modal_list')->with('success', 'Add Successfully');
    }
    public function edit($id)
    {     
        $singleData = LandingModalService::ModlSingleData($id);   
        return view('backend.landng_modal.add', compact('singleData'));
    }

    
    public function update(Request $request, $id, LandingModalService $LandingModal)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'status' => 'required',
            'use_for' => 'required',
            'image' => ['mimes:jpg,png,jpeg', 'max:2048'],
        ]);
        $LandingModal->updateEvent($request, $id);
        return redirect()->route('landing-modal.modal_list')->with('success', 'Edited Successfully');
    }
    public function status_change(Request $request, LandingModalService $LandingModal)
    { 
        $LandingModal->statusChangeEvent($request);
        return redirect()->route('landing-modal.modal_list')->with('success', 'Status Updated Successfully');
    }
    // public function delete(Request $request)
    // {
    //     // dd($id);
    //     $id = $request->id;
    //     $deleteData = LandingModal::find($id);
    //     // @unlink(public_path('upload/faculty/'.$deleteData->image));
    //     $deleteData->delete();
    //     return redirect()->route('landing-modal.edit', $id);
    // }
    public function deleteImage(Request $request)
    {
        // Find the record by ID and delete the associated image file
        $data = LandingModal::find($request->id);

        if ($data && $data->image) {
            // Assuming the image is stored in 'upload/modal/'
            $imagePath = public_path('upload/modal/' . $data->image);
            if (file_exists($imagePath)) {
                unlink($imagePath); // Delete the image file
            }

            // Optionally, set the image field to null and save
            $data->image = null;
            $data->update();
            return redirect()->route('landing-modal.edit', $request->id);
            // return response()->json(['success' => 'Image deleted successfully.']);
        }

        return response()->json(['error' => 'Image not found.'], 404);
    }
}
