<?php

namespace App\Services\Research;

use App\Models\CompletedResearch;
use App\Models\OngoingResearch;
use App\Models\Research;
use App\Models\ResearchFile;
use App\Services\IService;
use Illuminate\Http\Request;

class ResearchService implements IService
{
    /**
     * Get all data
     * @return mixed
     */
    public function getAll()
    {
        $data = Research::latest()->paginate(10);
        return $data;
    }

    public function getLimit($take)
    {
        $data = Research::take($take)->latest()->get();
        return $data;
    }
    /**
     * Create a new data
     * @param Request $data 
     * @return mixed
     */
    public function create(Request $request)
    {
        $params = $request->all();

        if($request->program_id == null && $request->faculty_id == null) {
            $ref_id = $request->department_id;
        } elseif($request->program_id == null && $request->department_id == null) {
            $ref_id = $request->faculty_id;
        } else {
            $ref_id = $request->program_id;
        }
        
        $params['date'] = date('Y-m-d', strtotime($request->date));
        $params['director_bup'] = $request->director_bup ?? 0;
        $params['supervisor_bup'] = $request->supervisor_bup ?? 0;
        $params['ref_id'] = $ref_id;
        $params['publish_status'] = $request->status;
        
        if ($file = $request->file('image')) {
            $filename = date('Ymd') . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/journal'), $filename);
            $params['image'] = $filename;
        }
        if ($attachment = $request->file('attachment')) {
            $attachmentname = date('Ymd') . '_' . time() . '.' . $attachment->getClientOriginalExtension();
            $attachment->move(public_path('upload/journal'), $attachmentname);
            $params['attachment'] = $attachmentname;
        }
        
        // if ($request->file) {
        //     $fileName = time() . '.' . $request->file->getClientOriginalExtension();
        //     $request->file->move(public_path('upload/journal'), $fileName);
        //     $params['file'] = $fileName;
        // }
        $research = Research::create($params);
        if($request->file_title){
            foreach ($request->file_title as $key_item => $item) {
                $data = new ResearchFile();
                $file = @$request->file[$key_item];
                if ($file != null) {
                    $data->research_id = $research->id;
                    $data->file_title = $request->file_title[$key_item];
                    $fileName = time() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('upload/journal'), $fileName);
                    $data['file'] = $fileName;
                    $data->save();
                }
            }
        }
    }

    /**
     * Update a data
     * @param Request $data
     * @param $id
     * @return mixed
     */
    public function update(Request $request, $id)
    {
        $research = Research::find($id);

        $params = $request->all();
        // dd($params);
        if($request->program_id == null && $request->faculty_id == null) {
            $ref_id = $request->department_id;
        } elseif($request->program_id == null && $request->department_id == null) {
            $ref_id = $request->faculty_id;
        } else {
            $ref_id = $request->program_id;
        }
        $params['date'] = date('Y-m-d', strtotime($request->date));
        $params['director_bup'] = $request->director_bup ?? 0;
        $params['supervisor_bup'] = $request->supervisor_bup ?? 0;
        $params['ref_id'] = $ref_id;
        $params['publish_status'] = $request->status;

        if ($file = $request->file('image')) {
            @unlink(public_path('upload/journal/' . $research->image));
            $filename = date('Ymd') . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/journal'), $filename);
            $params['image'] = $filename;
        }
        if ($attachment = $request->file('attachment')) {
            @unlink(public_path('upload/journal/' . $research->attachment));
            $attachmentname = date('Ymd') . '_' . time() . '.' . $attachment->getClientOriginalExtension();
            $attachment->move(public_path('upload/journal'), $attachmentname);
            $params['attachment'] = $attachmentname;
        }
        // dd($request->file);
        $research->update($params);
        // dd($research);
        if (!$request->file_id) {
            $request->file_id = [];
        }
        ResearchFile::where('research_id', $research->id)->whereNotIn('id', $request->file_id)->delete();
        foreach ($request->file_title as $key_item => $item) {
            if ($request->file_title[$key_item]) {
                $exist = ResearchFile::find(@$request->file_id[$key_item]);
                if ($exist) {
                    $file_data = $exist;
                } else {
                    $file_data = new ResearchFile();
                }
                $file_data->research_id = $research->id;
                $file_data->file_title = $request->file_title[$key_item];
                $file = @$request->file[$key_item];
                if ($file) {
                    $fileName = time() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('upload/journal'), $fileName);
                    $file_data['file'] = $fileName;
                }
                $file_data->save();
            }
        }
    }
    /**
     * Delete a data
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
    }
    /**
     * Get a data by id
     * @param $id
     * @return mixed
     */
    public function getByID($id)
    {
        $data = Research::findOrFail($id);
        return $data;
    }

    public function filesByResearch($research_id)
    {
        $data = ResearchFile::where('research_id', $research_id)->get();
        return $data;
    }

    public function ResearchByType($type_id, $category_id)
    {
        try {
            if ($type_id == 'completed_research') {
                $data = CompletedResearch::where('research_for', $category_id)->latest()->get();
            } else if ($type_id == 'ongoing_research') {
                $data = OngoingResearch::where('research_for', $category_id)->latest()->get();
            }
            return $data;
        } catch (\Exception $e) {
            return response()->json(["msg" => $e->getMessage()]);
        }
    }
    public function ResearchByResearchType($research_type)
    {
        try {
            $data = Research::where('research_type', $research_type)->latest()->get();
            return $data;
        } catch (\Exception $e) {
            return response()->json(["msg" => $e->getMessage()]);
        }
    }
    public function getByTypeAndYear($research_type, $year)
    {
        try {
            $data = Research::where('research_type', $research_type)->where('year', $year)->latest()->get();
            return $data;
        } catch (\Exception $e) {
            return response()->json(["msg" => $e->getMessage()]);
        }
    }
    public function ResearchByResearchFor($research_for)
    {
        try {
            $data = Research::where('research_for', $research_for)->latest()->get();
            return $data;
        } catch (\Exception $e) {
            return response()->json(["msg" => $e->getMessage()]);
        }
    }

    public function ResearchByFaculty($ref_id)
    {
        try {
            $data = Research::where('research_for', 3)->where('ref_id', $ref_id)->latest()->get();
            return $data;
        } catch (\Exception $e) {
            return response()->json(["msg" => $e->getMessage()]);
        }
    }

    public function ResearchByDepartment($department_id)
    {
        try {
            // $data = Research::where('research_for', 2)->where('department_id', $department_id)->latest()->take(2)->get();
            $data = Research::where('research_for', 2)->where('ref_id', $department_id)->latest()->get();
            return $data;
        } catch (\Exception $e) {
            return response()->json(["msg" => $e->getMessage()]);
        }
    }

    public function ResearchByFacultyYear($ref_id, $year)
    {
        try {
            $data = Research::where('research_for', 2)->where('ref_id', $ref_id)->where('year', $year)->latest()->get();
            return $data;
        } catch (\Exception $e) {
            return response()->json(["msg" => $e->getMessage()]);
        }
    }
    public function ResearchByResearchForRange($research_for, $take)
    {
        try {
            $data = Research::where('research_for', $research_for)->take($take)->latest()->get();
            return $data;
        } catch (\Exception $e) {
            return response()->json(["msg" => $e->getMessage()]);
        }
    }
    public function FundedResearchByResearchFor($research_for)
    {
        try {
            $data = Research::where('research_for', $research_for)->where('research_type', 1)->latest()->get();
            return $data;
        } catch (\Exception $e) {
            return response()->json(["msg" => $e->getMessage()]);
        }
    }
    public function FundedResearchByResearchForWithRange($research_for, $take)
    {
        try {
            $data = Research::where('research_for', $research_for)->where('research_type', 1)->take($take)->latest()->get();
            return $data;
        } catch (\Exception $e) {
            return response()->json(["msg" => $e->getMessage()]);
        }
    }
    public function CompletedResearchByResearchFor($research_for)
    {
        try {
            $data = Research::where('research_for', $research_for)
            ->where('research_type', '!=' , 1) 
            ->where(function ($query) {
                return $query->where('publish_status', 4)->orWhere('publish_status', 5);
            })
            ->latest()
            ->get();
            return $data;
        } catch (\Exception $e) {
            return response()->json(["msg" => $e->getMessage()]);
        }
    }
    public function CompletedResearchByResearchForWithRange($research_for, $take)
    {
        try {
            $data = Research::where('research_for', $research_for)
            ->where('research_type', '!=' , 1)
            ->where('publish_status', 4)
            ->orWhere('publish_status', 5)
            ->take($take)
            ->latest()
            ->get();
            return $data;
        } catch (\Exception $e) {
            return response()->json(["msg" => $e->getMessage()]);
        }
    }
    public function getOngoingResearch($research_for)
    {
        try {
            $data = Research::where('research_for', $research_for)->where('publish_status','!=', 4)->latest()->get();
            return $data;
        } catch (\Exception $e) {
            return response()->json(["msg" => $e->getMessage()]);
        }
    }
    public function getCompletedResearch($research_for)
    {
        try {
            $data = Research::where('research_for', $research_for)->where('publish_status', 4)->latest()->get();
            return $data;
        } catch (\Exception $e) {
            return response()->json(["msg" => $e->getMessage()]);
        }
    }
    
    public function getOngoingResearchWithRange($research_for, $take)
    {
        try {
            $data = Research::where('research_for', $research_for)
            ->where('publish_status','!=', 4)
            ->where('publish_status','!=', 5)
            // ->where(function ($query) {
            //     return $query->where('publish_status','!=', 4)->Where('publish_status','!=', 5);
            // })
            ->latest()->take($take)->get();
            return $data;
        } catch (\Exception $e) {
            return response()->json(["msg" => $e->getMessage()]);
        }
    }
    public function getAllOngoingResearch()
    {
        try {
            $data = Research::where('publish_status','!=', 4)->where('publish_status','!=', 5)->latest()->get();
            return $data;
        } catch (\Exception $e) {
            return response()->json(["msg" => $e->getMessage()]);
        }
    }
    public function getOngoingResearchByYear($year)
    {
        try {
            $data = Research::where('publish_status','!=', 4)->where('publish_status','!=', 5)->where('year',$year)->latest()->get();
            return $data;
        } catch (\Exception $e) {
            return response()->json(["msg" => $e->getMessage()]);
        }
    }

    public function getCompletedResearchWithRange($research_for, $take)
    {
        try {
            $data = Research::where('research_for', $research_for)
            ->where(function ($query) {
                return $query->where('publish_status', 4)->orWhere('publish_status', 5);
            })
            ->latest()
            ->take($take)
            ->get();

            return $data;
        } catch (\Exception $e) {
            return response()->json(["msg" => $e->getMessage()]);
        }
    }
    public function researchDetail($research_id)
    {
        try {
            $data = Research::findOrFail($research_id);
            return $data;
        } catch (\Exception $e) {
            return response()->json(["msg" => $e->getMessage()]);
        }
    }
    public function getByForAndYear($research_for, $year)
    {
        try {
            $data = Research::where('research_for', $research_for)->where('year', $year)->latest()->get();
            return $data;
        } catch (\Exception $e) {
            return response()->json(["msg" => $e->getMessage()]);
        }
    }
    public function getFundedResearchByForAndYear($research_for, $year)
    {
        try {
            $data = Research::where('research_for', $research_for)->where('year', $year)->where('research_type', 1)->latest()->get();
            return $data;
        } catch (\Exception $e) {
            return response()->json(["msg" => $e->getMessage()]);
        }
    }
    public function CompletedResearchByResearchForAndYear($research_for, $year)
    {
        try {
            $data = Research::where('research_for', $research_for)
            ->where('year', $year)
            ->where('research_type', '!=' , 1)
            ->where(function ($query) {
                return $query->where('publish_status', 4)->orWhere('publish_status', 5);
            })
            ->latest()
            ->get();
            return $data;
        } catch (\Exception $e) {
            return response()->json(["msg" => $e->getMessage()]);
        }
    }
    public function ResearchDetails($type, $id)
    {
        try {
            if ($type == 'completed_research') {
                $data = CompletedResearch::find($id);
            } else if ($type == 'ongoing_research') {
                $data = OngoingResearch::find($id);
            }
            return $data;
        } catch (\Exception $e) {
            return response()->json(["msg" => $e->getMessage()]);
        }
    }
}
