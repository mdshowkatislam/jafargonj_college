<?php

namespace App\Http\Controllers\Backend\ButexBuilder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\FormTemplate;
use App\Models\UserFormTemplate;
use App\Models\Faculty;
use App\Models\Department;
use App\Models\Office;
use App\Models\Club;
use App\Models\ButexForm;

class ButexFormBuilderController extends Controller
{
    public function index(Request $request){
        $form_data = FormTemplate::orderBy('id', 'desc')->get();
        return view('backend.butex_form_builder.index', compact('form_data'));
    }

    public function show(Request $request){
        return view('backend.butex_form_builder.form_builder');
    }

    public function showCustomForm(Request $request){
        $data = ButexForm::where('form_type', $request->id)->orderBy('id', 'desc')->get();
        $type = $request->id;
        return view('backend.butex_form_builder.custom_form', compact('data', 'type'));
    }

    public function showSingleCustomForm(Request $request){
        $data = ButexForm::where('id', $request->id)->first();
        return view('backend.butex_form_builder.custom_form_single', compact('data'));
    }

    public function showSingleCustomFormView(Request $request){
        $data = ButexForm::where('id', $request->id)->first();
        return view('backend.butex_form_builder.form', compact('data'));
    }

    public function showSingleCustomExcelForm(Request $request){
        $data = ButexForm::where('id', $request->id)->first();
        return view('backend.butex_form_builder.custom_form_excel_single', compact('data'));
    }

    public function view(Request $request){
        $formTemplate  = FormTemplate::find($request->id);
        $formTemplate->form_data = json_decode($formTemplate->form_data, true);

        return view('backend.butex_form_builder.form_view', compact('formTemplate'));
    }

    public function Dataview(Request $request){
        $user_form_data      = UserFormTemplate::find($request->id);
        $user_form_data_row  = UserFormTemplate::find($request->id); 
        $formTemplate        = FormTemplate::find($user_form_data->form_id);

        return view('backend.butex_form_builder.single_data', compact('user_form_data', 'user_form_data_row', 'formTemplate'));
    }

    public function DataviewPrint(Request $request){
        $user_form_data      = UserFormTemplate::find($request->id);
        $user_form_data_row  = UserFormTemplate::find($request->id); 
        $formTemplate        = FormTemplate::find($user_form_data->form_id);

        return view('backend.butex_form_builder.single_data_print', compact('user_form_data', 'user_form_data_row', 'formTemplate'));
    }

    public function DataviewPrintImage(Request $request){
        $user_form_data      = UserFormTemplate::find($request->id);
        $user_form_data_row  = UserFormTemplate::find($request->id); 
        $formTemplate        = FormTemplate::find($user_form_data->form_id);
        $decodedFormData     = $user_form_data->form_data;
  
        return view('backend.butex_form_builder.single_data_print_image', compact('decodedFormData', 'user_form_data', 'user_form_data_row', 'formTemplate'));
    }

    public function userForm(Request $request)
    {
        $user_form_data     = UserFormTemplate::where('form_id', $request->id)->orderBy('id', 'desc')->get();
        $user_form_data_row = UserFormTemplate::where('form_id', $request->id)->orderBy('id', 'desc')->first();
        $formTemplate       = FormTemplate::find($request->id);
        
        return view('backend.butex_form_builder.user_form', compact('user_form_data', 'user_form_data_row', 'formTemplate'));
    }

    public function edit(Request $request){
        $Template  = FormTemplate::find($request->id);
        $formTemplate = json_decode($Template->form_data, true);
        //$formTemplate  = $Template->form_data;
        $userData = UserFormTemplate::where('form_id', $request->id)->count();
        return view('backend.butex_form_builder.edit_from', compact('formTemplate', 'Template', 'userData'));
    }

    public function store(Request $request){
        $request->validate([
            'formData' => 'required',
            'templateTitle' => 'required|string|max:255',
        ]);

        // Create a new FormTemplate entry
        FormTemplate::create([
            'title'      => $request->input('templateTitle'),
            'start_date' => $request->input('start_date'),
            'end_date'   => $request->input('end_date'),
            'form_data'  => $request->input('formData'),
        ]);

        return response()->json(['message' => 'Template saved successfully!']);
    }

    public function update(Request $request){
        // $request->validate([
        //     'formData'      => 'required',
        //     'templateTitle' => 'required|string|max:255',
        // ]);

        $data = FormTemplate::find($request->input('templateId'));
        $data->title      = $request->input('templateTitle');
        $data->form_data  = $request->input('formData');
        $data->save();

        return response()->json(['message' => 'Template update successfully!']);
    }

    public function updateTemplateStatus(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'status' => 'required|string|in:active,inactive,draft', // Ensure the status is one of the expected values
        ]);

        // Find the item and update the status
        $item = FormTemplate::findOrFail($request->id);
        $item->status = $request->status;
        $item->save();

        return response()->json(['message' => 'Status updated successfully!']);
    }

    public function deleteFormTemplate(Request $request)
    {
        // Find the item and delete it
        $item = FormTemplate::findOrFail($request->id);

        $item->delete(); // Delete the item

        // Return a JSON response to indicate success
        return response()->json(['message' => 'Item deleted successfully!']);
    }

    public function deleteUserForm(Request $request)
    {
        // Find the item and delete it
        $item = UserFormTemplate::where('form_id', $request->id)->delete();

        // Return a JSON response to indicate success
        return response()->json(['message' => 'Item deleted successfully!']);
    }

    public function storeDynamicForm(Request $request)
    {
        $formData = $request->all();

        // Handle file uploads
        if ($request->hasFile('files')) {
            $filePaths = [];

            foreach ($request->file('files') as $file) {
                $destinationPath = public_path('documents');
                // Generate a unique filename (or use original name)
                $fileName = time() . '_' . $file->getClientOriginalName(); 
                // Move the file to the destination path
                $file->move($destinationPath, $fileName);
                // Store the file path in an array (relative path to be stored in the database)
                $filePaths[] = 'documents/' . $fileName;
            }
            $formData['files'] = $filePaths;
        }

        // Store the form data as JSON in the database
        UserFormTemplate::create([
            'form_id'   => $request->form_id,
            'form_data' => $formData, // Convert validated data to JSON
        ]);

         // Return a JSON response
         return response()->json([
            'message' => 'Form submitted successfully!',
        ]);
    }
}
