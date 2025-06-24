<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Form;
use App\Models\FormType;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FormController extends Controller
{


    public function index()
    {
        $data['form'] = Form::with('formType:id,title')->latest()->get();
        //dd($data['form']);
        return view('backend.manage_form.view', $data);
    }


    public function Add()
    {
        $data['formTypes'] = FormType::where('status', 1)->latest()->get();

        return view('backend.manage_form.add', $data);
    }

    public function Store(Request $request)
    {
        //    return $request->all();

        $request->validate([
            'title' => 'required',
            'pdf_file' => 'mimes:pdf,doc,docx',
            'type_id' => 'required',
            'status' => 'required',
        ]);


        $data = new Form();
        $data->title = $request->title;
        $data->publish_date = $request->publish_date;
        $data->status = $request->status;
        $data->type_id = $request->type_id;
        $data->year = date('Y', strtotime($request->publish_date));
        if ($request->hasfile('pdf_file')) {

            $image = $request->file('pdf_file');
            $ext = $image->extension();
            $image_name = time() . '.' . $ext;
            // $image->storeAs('/public/media/form', $image_name);
            $image->move(public_path('upload/media/'), $image_name);
            $data->file = $image_name;
        }

        $data->save();
        return redirect()->route('setup.manage_form')->with('success', 'Data Saved successfully');
    }

    public function Edit($id)
    {

        $data['editData'] = Form::find($id);
        $data['formTypes'] = FormType::where('status', 1)->latest()->get();
        return view('backend.manage_form.edit', $data);
    }



    public function Update(Request $request, $id)
    {

        $request->validate([
            'title' => 'required',
            'pdf_file' => 'mimes:pdf,doc,docx',
            'type_id' => 'required',
            'status' => 'required',
        ]);


        $data = Form::find($id);
        $data->title = $request->title;
        $data->publish_date = $request->publish_date;
        $data->status = $request->status;

        $data->type_id = $request->type_id;
        $data->year = date('Y', strtotime($request->publish_date));

        if ($request->hasfile('pdf_file')) {

            if ($request->post('id') > 0) {

                $arrImage = DB::table('forms')->where(['id' => $request->post('id')])->get();

                // if (Storage::exists('/public/media/form/' . $arrImage[0]->image)) {

                //     Storage::delete('/public/media/form/' . $arrImage[0]->image);
                // }
                @unlink(public_path('upload/media/' . $arrImage[0]->image));
            }

            $image = $request->file('pdf_file');
            $ext = $image->extension();
            $image_name = time() . '.' . $ext;
            // $image->storeAs('/public/media/form', $image_name);
            $image->move(public_path('upload/media'), $image_name);
            $data->file = $image_name;
        }
        $data->update();
        return redirect()->route('setup.manage_form')->with('success', 'Data Updated successfully');
    }
}
