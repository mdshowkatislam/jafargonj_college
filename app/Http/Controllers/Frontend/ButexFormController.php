<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ButexForm;
use Illuminate\Support\Str;

class ButexFormController extends Controller
{
    public function form1(){
        return view('frontend.form.form1');
    }

    public function form2(){
        return view('frontend.form.form2');
    }

    public function form3(){
        return view('frontend.form.form3');
    }

    public function form4(){
        return view('frontend.form.form4');
    }

    public function form5(){
        return view('frontend.form.form5');
    }

    public function store(Request $request)
    {
        $store  = new ButexForm();
        $store->form_type  = $request->form_type;
        $store->data1   = $request->data1;
        $store->data2   = $request->data2;
        $store->data3   = $request->data3;
        $store->data4   = $request->data4;
        $store->data5   = $request->data5;
        $store->data6   = $request->data6;
        $store->data7   = $request->data7;
        $store->data8   = $request->data8;
        $store->data9   = $request->data9;
        $store->data10  = $request->data10;
        $store->data11  = $request->data11;
        $store->data12  = $request->data12;
        $store->data13  = $request->data13;
        $store->data14  = $request->data14;
        $store->data15  = $request->data15;
        $store->data16  = $request->data16;
        $store->data17  = $request->data17;
        $store->data18  = $request->data18;
        $store->data19  = $request->data19;
        $store->data20  = $request->data20;
        $store->data21  = $request->data21;
        $store->data22  = $request->data22;
        $store->data23  = $request->data23;
        $store->data24  = $request->data24;
        $store->data25  = $request->data25;
        $store->data26  = $request->data26;
        $store->data27  = $request->data27;
        $store->data28  = $request->data28;
        $store->data29  = $request->data29;
        $store->data30  = $request->data30;
        $store->data31  = $request->data31;
        $store->data32  = $request->data32;
        $store->data33  = $request->data33;
        $store->data34  = $request->data34;
        $store->data35  = $request->data35;
        $store->data36  = $request->data36;
        $store->data37  = $request->data37;
        $store->data38  = $request->data38;
        $store->data39  = $request->data39;
        $store->data40  = $request->data40;
        $store->data41  = $request->data41;
        $store->data42  = $request->data42;
        $store->data43  = $request->data43;
        $store->data44  = $request->data44;
        $store->data45  = $request->data45;
        $store->data46  = $request->data46;
        $store->data47  = $request->data47;
        $store->data48  = $request->data48;
        $store->data49  = $request->data49;
        $store->data50  = $request->data50;
        $store->data51  = $request->data51;
        $store->data52  = $request->data52;
        $store->data53  = $request->data53;
        $store->data54  = $request->data54;
        $store->data55  = $request->data55;
        $store->data56  = $request->data56;
        $store->data57  = $request->data57;
        $store->data58  = $request->data58;
        $store->data61  = $request->data61;
        $store->data62  = $request->data62;
        $store->data63  = $request->data63;
        $store->data64  = $request->data64;

        if ($request->hasFile('data59')) {
            $file = $request->file('data59');
            $filename = now()->format('YmdHis') . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $store->data59 = $filename;
        }

        if ($request->hasFile('data60')) {
            $file = $request->file('data60');
            $filename = now()->format('YmdHis') . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $store->data60 = $filename;
        }

        $response = $store->save();

        // Check if the record was successfully created
        if ($response) {
            return back()->with('success', 'Form submitted successfully');
        } else {
            return back()->with('error', 'Failed to submit the form. Please try again.');
        }
    }

    public function customFormTemplateDelete(Request $request)
    {
        // Find the item and delete it
        $item = ButexForm::where('id', $request->id)->delete();

        // Return a JSON response to indicate success
        return response()->json(['message' => 'Item deleted successfully!']);
    }
    
    
}