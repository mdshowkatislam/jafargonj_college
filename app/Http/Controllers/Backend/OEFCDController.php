<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AboutInternationalAffair;
use App\Models\CurriculumnDevelopment;
use App\Models\OefcdAbout;
use App\Models\OefcdEvaluation;
use App\Models\Page;
use App\Models\OefcdFacultyDevelopmentProgram;
use App\Models\OefcdOfficerDevelopmentProgram;
use App\Models\OefcdTrainer;
use App\Models\Office;
use App\Models\Profile;
use Illuminate\Http\Request;


class OEFCDController extends Controller
{
    public function index()
    {
        $data['office'] = Office::where('name', 'like', '%oefcd%')->first();
        return view('backend.oefcd.view', $data);
    }

    public function internationalAffair()
    {
        return view('backend.oefcd.international_affair.index');
    }

    public function aboutInternationalAffair()
    {
        $data = AboutInternationalAffair::first();
        return view('backend.oefcd.international_affair.about', compact('data'));
    }

    public function aboutInternationalAffairUpdate($id, Request $request)
    {
        // return $request->all();
        $request->validate([
            "content" => "required|min:20",
        ]);
        $data = AboutInternationalAffair::findOrFail($id);
        // return $data;
        if (!empty($data)) {
            //    $data->mission_vision = $request->mission_vision;
            $data->content = $request->content;
            $data->save();
        }
        return redirect()->back()->with('success', 'Data updated Successfully');
    }

    public function postList()
    {
        $posts = Page::with('menu_type')->where('type', 6)->where('status', '1')->get();
        return view('backend.post.post-view', compact('posts'));
    }
    public function contact()
    {
        // return "contact page under constructio";
        // $posts = Page::with('menu_type')->where('type', 6)->where('status','1')->get();
        return view('backend.oefcd.international_affair.contact');
    }


    public function officers_development_program()
    {
        $data = OefcdOfficerDevelopmentProgram::first();
        return view('backend.oefcd.officer_development_program.index', compact('data'));
    }

    public function officers_development_program_update($id, Request $request)
    {
        $request->validate([
            "description" => "required",
        ]);
        $data = OefcdOfficerDevelopmentProgram::findOrFail($id);

        if (!empty($data)) {
            $data->description = $request->description;
            $data->save();
        }
        return redirect()->route('oefcd.index')->with('success', 'Data updated Successfully');
    }

    // faculty  de
    public function about_oefcd()
    {
        $data = OefcdAbout::first();
        return view('backend.oefcd.about.index', compact('data'));
    }
    public function about_oefcd_update($id, Request $request)
    {
        $request->validate([
            'mission' => 'required',
            'vision' => 'required',
            'objectives' => 'required',
            'functions' => 'required'
        ]);
        $data = OefcdAbout::findOrFail($id);
        // return $data;
        if (!empty($data)) {
            $data->mission = $request->mission;
            $data->vision = $request->vision;
            $data->objective = $request->objective;
            $data->functions = $request->functions;
            $data->save();
        }
        return redirect()->back()->with('success', 'Data updated Successfully');
    }

    // faculty  de
    public function development_program()
    {
        $data = OefcdFacultyDevelopmentProgram::first();
        return view('backend.oefcd.development_program.index', compact('data'));
    }
    public function development_program_update($id, Request $request)
    {
        $request->validate([
            'mission_vision' => 'required',
            'content' => 'required'
        ]);
        $data = OefcdFacultyDevelopmentProgram::findOrFail($id);
        // return $data;
        if (!empty($data)) {
            $data->mission_vision = $request->mission_vision;
            $data->content = $request->content;
            $data->save();
        }
        return redirect()->back()->with('success', 'Data updated Successfully');
    }

    public function curriculumnDevelopment()
    {
        $data = CurriculumnDevelopment::first();
        return view('backend.oefcd.curriculumn_development.index', compact('data'));
    }

    public function curriculumnDevelopmentUpdate($id, Request $request)
    {
        $request->validate([
            'description' => 'required',
        ]);
        // return $request->all();
        $data = CurriculumnDevelopment::findOrFail($id);
        // return $data;
        if (!empty($data)) {
            $data->description = $request->description;
            $data->save();
        }
        return redirect()->back()->with('success', 'Data updated Successfully');
    }
    public function evaluation()
    {
        $data = OefcdEvaluation::first();
        return view('backend.oefcd.evaluation.index', compact('data'));
    }

    public function evaluationUpdate($id, Request $request)
    {

        // return $request->all();
        $request->validate([
            'description' => 'required'
        ]);
        $data = OefcdEvaluation::findOrFail($id);
        // return $data;
        if (!empty($data)) {
            $data->description = $request->description;
            $data->save();
        }
        return redirect()->back()->with('success', 'Data updated Successfully');
    }

    public function trainerList()
    {

        $trainer_list = OefcdTrainer::with('profile', 'designation')->get();
        return view('backend.oefcd.trainer.list', compact('trainer_list'));
    }

    public function create()
    {
        $trainer_list = Profile::all();
        return view('backend.oefcd.trainer.add', compact('trainer_list'));
    }

    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
            'profile_id' => 'required',
        ], [
            'profile_id.required' => 'Please Choose a Member'
        ]);

        $trainer_list = new OefcdTrainer();
        $trainer_list->profile_id = $request->profile_id;
        $trainer_list->rank = $request->rank;
        $trainer_list->designation_id = $request->designation_id;
        $trainer_list->status = $request->status;

        $trainer_list->save();

        return redirect()->route('oefcd.staff.trainer.list')->with('success', 'Trainer Added successfully');
    }

    public function edit($id)
    {
        $trainer_list = Profile::all();
        $editData = OefcdTrainer::findOrFail($id);
        return view('backend.oefcd.trainer.add', compact('editData', 'trainer_list'));
    }

    public function update($id, Request $request)
    {
        // return $request->all();
        $request->validate([
            'profile_id' => 'required',
        ], [
            'profile_id.required' => 'Please Choose a Member'
        ]);

        $trainer_list = OefcdTrainer::find($id);
        $trainer_list->profile_id = $request->profile_id;
        $trainer_list->rank = $request->rank;
        $trainer_list->designation_id = $request->designation_id;
        $trainer_list->status = $request->status;

        $trainer_list->save();

        return redirect()->route('oefcd.staff.trainer.list')->with('success', 'Trainer Update successfully');
    }
}
