<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Page;
use App\Models\FormTemplate;
use Illuminate\Support\Facades\Auth;

class CustomPageController extends Controller
{
    public function index()
    {
        $data['custom_pages'] = Page::all();

        return view('backend.custom_page.view', $data);
    }

    public function Add()
    {
        $form_template = FormTemplate::where('status', 'active')->orderBy('id', 'desc')->get();
        return view('backend.custom_page.add', compact('form_template'));
    }

    public function Store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'mimes:jpg,jpeg,png',
        ]);

        $params = $request->all();
        $img = $request->file('image');
        if ($img) {
            if (!session()->get('crop_image_name')) {
                $imgName = date('YmdHi') . $img->getClientOriginalName();
                $img->move('assets/welcome/', $imgName);
                $params['image'] = $imgName;
            } else {
                $params['image'] = session()->get('crop_image_name');
                session()->remove('crop_image_name');
            }
        }
        $params['form_layout'] = $request->has('form_layout') ? 'on' : 'off';

        $data = Page::create($params);

        if ($data) {
            logData($primary_id = $data->id, $url = url()->previous(), $old_data = '', $new_data = $data, $action = 'Custom Page Created', $created_by = Auth::id());
        }

        return redirect()->route('setup.custom_page')->with('success', 'Data Saved successfully');
    }

    public function Edit($id)
    {
        $data['editData'] = Page::find($id);
        $form_template = FormTemplate::where('status', 'active')->orderBy('id', 'desc')->get();
        return view('backend.custom_page.add', $data, compact('form_template'));
    }

    public function Update(Request $request, $id)
    {

        $request->validate([
            'title' => 'required',
            'image' => 'mimes:jpg,jpeg,png',
        ]);
        $data   = Page::find($id);
        $params = $request->all();

        $img = $request->file('image');
        if ($img) {
            //dd(session()->get('crop_image_name'));
            if (file_exists(public_path('assets/welcome/' . $data->image))) {
                @unlink(public_path('assets/welcome/' . $data->image));
            }
            if (!session()->get('crop_image_name')) {
                $imgName = date('YmdHi') . $img->getClientOriginalName();
                $img->move('assets/welcome/', $imgName);
                $params['image'] = $imgName;
            } else {
                $params['image'] = session()->get('crop_image_name');
                session()->remove('crop_image_name');
            }
        }
        $params['form_layout'] = $request->has('form_layout') ? 'on' : 'off';

        $data->update($params);

        if ($data) {
            logData($primary_id = $data->id, $url = url()->previous(), $old_data = '', $new_data = $data, $action = 'Custom Page Updated', $created_by = Auth::id());
        }
        
        return back()->with('success', 'Data Updated successfully');
        //return redirect()->route('setup.custom_page')->with('success', 'Data Updated successfully');
    }

    public function Delete(Request $request)
    {
        $data = Page::find($request->id);
        $data->delete();

        return redirect()->route('setup.custom_page')->with('success', 'Data Deleted successfully');
    }
}
