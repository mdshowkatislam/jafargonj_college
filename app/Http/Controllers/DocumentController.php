<?php

namespace App\Http\Controllers;

use App\Models\AssignToClub;
use App\Models\Club;
use App\Models\Document;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DocumentController extends Controller
{


    public function index($id = null)
    {
        if (Auth::check()) {
            $user = Auth::user();

            if ($user->id == 1) {
                $data['documentList'] = Document::where('type_id', $id)->get();
            } else {

                $user_role = UserRole::where('user_id', $user->id)->first();

                switch ($user_role->role_id) {
                    case '3':
                        // Club Role = 3 & Club Document ID = 3
                        if ($id == 3) {
                            $assign_club = AssignToClub::where('club_member_id', $user->profile_id)->get();
                            if ($assign_club) {
                                $club_ids = $assign_club->pluck('club_id')->toArray();

                                $data['documentList'] = Document::where('type_id', $id)
                                ->whereIn('ref_id', $club_ids)
                                ->get();
                                
                            }else{
                                $data['documentList'] = collect();
                            }
                            
                        } else {
                            abort(403, 'You do not have permission to access this page.');
                        }
                        break;
                    case '8':
                        // CPC Role = 8 & CPC Document ID = 2
                        if ($id == 2) {
                            $data['documentList'] = Document::where('type_id', $id)->get();
                        } else {
                            abort(403, 'You do not have permission to access this page.');
                        }
                        break;
                    case '10':
                        // IQAC Role = 10 & IQAC Document ID = 1
                        if ($id == 1) {
                            $data['documentList'] = Document::where('type_id', $id)->get();
                        } else {
                            abort(403, 'You do not have permission to access this page.');
                        }
                        break;

                    case '11':
                        // OEFCD Role = 11 & OEFCD Document ID = 4
                        if ($id == 4) {
                            $data['documentList'] = Document::where('type_id', $id)->get();
                        } else {
                            abort(403, 'You do not have permission to access this page.');
                        }
                        break;

                    default:
                        $data['documentList'] = collect();
                        break;
                }
            }
        } else {
            $data['documentList'] = collect(); // Unauthorized User
        }

        $data['type_id'] = $id;
        switch ($id) {
            case '1':
                $data['document_type'] = 'IQAC';
                break;
            case '2':
                $data['document_type'] = 'CPC';
                break;
            case '3':
                $data['document_type'] = 'Club';
                break;
            case '4':
                $data['document_type'] = 'OEFCD';
                break;
            case '5':
                $data['document_type'] = 'ORE';
                break;
            default:
                $data['document_type'] = '';
                break;
        }


        return view('backend.document.list', $data);
    }

    public function add($id = null)
    {

        $data['TrainingWorkShopMember'] = Document::with('member')->get();
        $data['type_id'] = $id;
        switch ($id) {
            case '1':
                $data['document_type'] = 'IQAC';
                break;
            case '2':
                $data['document_type'] = 'CPC';
                break;
            case '3':
                $data['document_type'] = 'Club';
                break;
            case '4':
                $data['document_type'] = 'OEFCD';
                break;
            case '5':
                $data['document_type'] = 'ORE';
                break;
            default:
                $data['document_type'] = '';
                break;
        }

        $user = Auth::user();

        $data['clubs'] = [];

        if ($user->id == 1) {
            $data['clubs'] = Club::where('status', 1)->latest()->get(['id', 'name']);
        } else {
            $user_role = UserRole::where('user_id', $user->id)->first();
            switch ($user_role->role_id) {
                case '3':
                    // Club Role = 3 & Club Document ID = 3
                    if ($id == 3) {
                        $assign_club = AssignToClub::where('club_member_id', $user->profile_id)->get();
                        if ($assign_club) {
                            $club_ids = $assign_club->pluck('club_id')->toArray();
                            $data['clubs'] = Club::whereIn('id', $club_ids)->where('status', 1)->latest()->get(['id', 'name']);
                        }
                        return view('backend.document.add', $data);
                    } else {
                        abort(403, 'You do not have permission to access this category.');
                    }
                case '8':
                    // CPC Role = 8 & CPC Document ID = 2
                    if ($id == 2) {
                        return view('backend.document.add', $data);
                    } else {
                        abort(403, 'You do not have permission to access this category.');
                    }
                case '10':
                    // IQAC Role = 10 & IQAC Document ID = 1
                    if ($id == 1) {
                        return view('backend.document.add', $data);
                    } else {
                        abort(403, 'You do not have permission to access this category.');
                    }

                case '11':
                    // OEFCD Role = 11 & OEFCD Document ID = 4
                    if ($id == 4) {
                        return view('backend.document.add', $data);
                    } else {
                        abort(403, 'You do not have permission to access this category.');
                    }

                default:
                    break;
            }
        }


        return view('backend.document.add', $data);
    }

    public function store(Request $request)
    {

        $request->validate([
            'title'     => 'required',
            'type_id'   => 'required',
            'image'     => 'mimes:jpg,png,jpeg',
            'document'  => 'mimes:pdf,doc,docx',
            'status'    => 'required',
        ], [
            'type_id.required'   => 'Please fill the document type field.',
        ]);

        $data               = new Document();
        $data->title        = $request->title;
        $data->type_id      = $request->type_id;
        $data->status       = $request->status;
        $data->created_by   = Auth::id() ?? null;

        switch ($request->type_id) {
            case '3':
                $data->ref_id = $request->club_id;
                break;

            default:
                $data->ref_id = null;
                break;
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = now()->format('YmdHis') . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $data->image = $filename;
        }

        if ($request->hasFile('document')) {
            $file = $request->file('document');
            $filename = now()->format('YmdHis') . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $data->document = $filename;
        }

        // if ($request->hasfile('image')) {

        //     $image = $request->file('image');
        //     $ext = $image->extension();
        //     $image_name = time() . '.' . $ext;
        //     $image->storeAs('/public/media/trainingimage', $image_name);
        //     $data->image = $image_name;
        // }

        // if ($request->hasfile('document')) {

        //     $image = $request->file('document');
        //     $ext = $image->extension();
        //     $image_name = time() . '.' . $ext;
        //     $image->storeAs('/public/media/training', $image_name);
        //     $data->document = $image_name;
        // }

        $data->save();
        logData($primary_id = $data->id, $url = url()->previous(), $old_data = null, $new_data = $data, $action = 'Add Document', $created_by =  Auth::id(), $updated_by = null);
        return redirect()->route('manage_document', $request->type_id)->with('success', 'Data Saved successfully');
    }


    public function edit($type_id, $document_id)
    {

        $data['TrainingWorkShopMember'] = Document::with('member')->get();
        $data['type_id'] = $type_id;

        switch ($type_id) {
            case '1':
                $data['document_type'] = 'IQAC';
                break;
            case '2':
                $data['document_type'] = 'CPC';
                break;
            case '3':
                $data['document_type'] = 'Club';
                break;
            case '4':
                $data['document_type'] = 'OEFCD';
                break;
            case '5':
                $data['document_type'] = 'ORE';
                break;
            default:
                $data['document_type'] = '';
                break;
        }

        $user = Auth::user();

        $data['clubs'] = [];

        if ($user->id == 1) {
            $data['editData'] = Document::where('id', $document_id)->where('type_id', $type_id)->firstOrFail();
            $data['clubs'] = Club::where('status', 1)->latest()->get(['id', 'name']);
        } else {
            $user_role = UserRole::where('user_id', $user->id)->first();
            switch ($user_role->role_id) {
                case '3':
                    // Club Role = 3 & Club Document ID = 3
                    if ($type_id == 3) {
                        $data['editData'] = Document::where('id', $document_id)
                            ->where(function ($query) use ($user) {
                                $query->where('created_by', $user->id);
                                // ->orWhere('created_by', 1); // Include admin documents
                            })->firstOrFail();

                        $assign_club = AssignToClub::where('club_member_id', $user->profile_id)->get();
                        if ($assign_club) {
                            $club_ids = $assign_club->pluck('club_id')->toArray();
                            $data['clubs'] = Club::whereIn('id', $club_ids)->where('status', 1)->latest()->get(['id', 'name']);
                        }

                        return view('backend.document.edit', $data);
                    } else {
                        abort(403, 'You do not have permission to access this category.');
                    }
                case '8':
                    // CPC Role = 8 & CPC Document ID = 2
                    if ($type_id == 2) {
                        $data['editData'] = Document::where('id', $document_id)->where('type_id', $type_id)->firstOrFail();
                        return view('backend.document.edit', $data);
                    } else {
                        abort(403, 'You do not have permission to access this category.');
                    }
                case '10':
                    // IQAC Role = 10 & IQAC Document ID = 1
                    if ($type_id == 1) {
                        $data['editData'] = Document::where('id', $document_id)->where('type_id', $type_id)->firstOrFail();
                        return view('backend.document.edit', $data);
                    } else {
                        abort(403, 'You do not have permission to access this category.');
                    }

                case '11':
                    // OEFCD Role = 11 & OEFCD Document ID = 4
                    if ($type_id == 4) {
                        $data['editData'] = Document::where('id', $document_id)->where('type_id', $type_id)->firstOrFail();
                        return view('backend.document.edit', $data);
                    } else {
                        abort(403, 'You do not have permission to access this category.');
                    }

                default:
                    break;
            }
        }


        return view('backend.document.edit', $data);
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'title'     => 'required',
            'type_id'   => 'required',
            'image'     => 'mimes:jpg,png,jpeg',
            'document'  => 'mimes:pdf,doc,docx',
            'status'    => 'required',

        ], [
            'type_id.required'   => 'Please fill the document type field.',
        ]);

        $data               = Document::find($id);
        $data->title        = $request->title;
        $data->type_id      = $request->type_id;
        $data->status       = $request->status;
        $data->updated_by   = Auth::id() ?? null;

        switch ($request->type_id) {
            case '3':
                $data->ref_id = $request->club_id;
                break;

            default:
                $data->ref_id = null;
                break;
        }

        
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = now()->format('YmdHis') . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $data->image = $filename;
        }

        if ($request->hasFile('document')) {
            $file = $request->file('document');
            $filename = now()->format('YmdHis') . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $data->document = $filename;
        }

        // if ($request->hasfile('image')) {

        //     $image = $request->file('image');
        //     $ext = $image->extension();
        //     $image_name = time() . '.' . $ext;
        //     $image->storeAs('/public/media/trainingimage', $image_name);
        //     $data->image = $image_name;
        // }

        // if ($request->hasfile('document')) {
        //     $image = $request->file('document');
        //     $ext = $image->extension();
        //     $image_name = time() . '.' . $ext;
        //     $image->storeAs('/public/media/training', $image_name);
        //     $data->document = $image_name;
        // }
        $data->save();
        logData($primary_id = $id, $url = url()->previous(), $old_data = null, $new_data = $data, $action = 'Update Document', $created_by = null, $updated_by = Auth::id());
        return redirect()->route('manage_document', $request->type_id)->with('success', 'Data Updated successfully');
    }

    public function delete(Request $request)
    {
        $data = Document::find($request->id);
        $data->deleted_by   = Auth::id() ?? null;
        $data->delete();
        logData($primary_id = $request->id, $url = url()->previous(), $old_data = null, $new_data = $data, $action = 'Delete Document', $created_by = null, $updated_by = null, $deleted_by = Auth::id());
        return redirect()->route('manage_document', $data->type_id)->with('success', 'Data Deleted successfully');
    }
}
