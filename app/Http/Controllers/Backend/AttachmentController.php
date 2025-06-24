<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttachmentController extends Controller
{
    public function index()
    {
    	$data['form']= Attachment::get();
        return view('backend.attachment.view',$data);
    }


    public function Add()
    {
    	return view('backend.attachment.add');
    }

    public function Store(Request $request)
    {
        //dd($request->all());

        $request->validate([

          'pdf_file'=>'required|mimes:pdf,doc,docx',

        ]);

        DB::beginTransaction();
        try {
            $data = new Attachment();
            $data->title = $request->title;
            $data->publish_date = $request->publish_date;
            $data->status = $request->status;
            $data->type_id = $request->type_id;
            $data->year = date('Y', strtotime($request->publish_date));
            if ($request->hasfile('pdf_file')) {
                $image = $request->file('pdf_file');
                $ext = $image->extension();
                $image_name = time() . '.' . $ext;
                $image->storeAs('/public/media/form', $image_name);
                $data->file = $image_name;
            }

            $data->save();
            DB::commit();
            return redirect()->route('setup.attachment')->with('success','Data Saved successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('setup.attachment')->with('success', 'Something Went Wrong !');
        }

    	
    	
    }

    public function Edit($id)
    {

    	$data['editData'] = Attachment::findOrFail($id);

    	return view('backend.attachment.edit',$data);
    }



    public function Update(Request $request,$id)
    {
        $request->validate([
            'pdf_file'=>'mimes:pdf,doc,docx',
          ]);
        //return $request->all();
        DB::beginTransaction();
        try{

            $data = Attachment::findOrFail($id);
            $data->title = $request->title;
            $data->publish_date = $request->publish_date;
            $data->status = $request->status;
            $data->type_id = $request->type_id;
            $data->year = date('Y', strtotime($request->publish_date));

            if ($request->hasfile('pdf_file')) {

                if ($request->post('id') > 0) {

                    $arrImage = DB::table('forms')->where(['id' => $request->post('id')])->get();

                    if (Storage::exists('/public/media/form/' . $arrImage[0]->image)) {

                        Storage::delete('/public/media/form/' . $arrImage[0]->image);
                    }
                }

                $image = $request->file('pdf_file');
                $ext = $image->extension();
                $image_name = time() . '.' . $ext;
                $image->storeAs('/public/media/form', $image_name);
                $data->file = $image_name;
            }
            $data->save();
            DB::commit();
            return redirect()->route('setup.attachment')->with('success','Data Updated successfully');

        }catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('setup.attachment')->with('success', 'Something Went Wrong !');
        }
    	
    }
}
