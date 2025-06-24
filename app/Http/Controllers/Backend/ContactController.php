<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function index()
    {
        $data['editData'] = Contact::first();
        return view('backend.contact.view', $data);
    }

    public function store(Request $request)
    {

        $request->validate([
            'email'     => 'required|email',
            'phone' => ['required', 'regex:/^(?:\+88|01)?\d{11}$/'],
            'fax'       => 'required',
            'location'  => 'required'
        ]);
        $data           = new Contact();
        $data->email    = $request->email;
        $data->phone    = $request->phone;
        $data->fax      = $request->fax;
        $data->location = $request->location;
        $data->save();

        return redirect()->route('site-setting.contact')->with('success', 'Data Saved successfully');
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'email'     => 'required|email',
            'phone'     => ['required', 'regex:/^(?:\+88|01)?\d{11}$/'],
            'fax'       => ['required', 'regex:/^\+880[\s\-]?\d{1,4}[\s\-]?\d{6,9}$/'],
            'location'  => 'required|regex:/^[\pL\s\d\-,\.]+$/u'
        ]);
        $data           = Contact::find($id);
        $data->email    = $request->email;
        $data->phone    = $request->phone;
        $data->fax      = $request->fax;
        $data->location = $request->location;
        $data->save();

        return redirect()->route('site-setting.contact')->with('success', 'Data Update successfully');
    }
}
