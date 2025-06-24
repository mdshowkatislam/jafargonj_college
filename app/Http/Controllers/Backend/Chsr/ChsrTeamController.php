<?php

namespace App\Http\Controllers\Backend\Chsr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChsrTeam;
use App\Models\Profile;

class ChsrTeamController extends Controller
{
    public function index()
    {
    
        $data['traningList'] = ChsrTeam::with('member')->get();
        return view('backend.chsr-team.list', $data);
    }

    public function add()
    {

        $data['teaMember'] = Profile::get();
        return view('backend.chsr-team.add', $data);
    }

    public function store(Request $request)
    {
        $request->validate([]);

        $data                   = new ChsrTeam();
        $data->team_member      = $request->team_member;
        $data->designation      = $request->designation;
        $data->status           = $request->status;
        $data->save();
        return redirect()->route('chsr.manage_team')->with('success', 'Data Saved successfully');
    }


    public function edit($id)
    {
        $data['editData'] = ChsrTeam::find($id);
        $data['teamMember'] = Profile::get();
        return view('backend.chsr-team.edit', $data);
    }

    public function update(Request $request, $id)
    {

        $request->validate([]);

        $data                   = ChsrTeam::find($id);
        $data->team_member      = $request->team_member;
        $data->designation      = $request->designation;
        $data->status           = $request->status;
        $data->save();
        return redirect()->route('chsr.manage_team')->with('success', 'Data Updated successfully');
    }

    public function delete(Request $request)
    {
        $data = ChsrTeam::find($request->id);
        $data->delete();
        return redirect()->route('chsr.manage_team')->with('success', 'Data Deleted successfully');
    }
}
