<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\BannerService;
use App\Services\Journal\JournalService;
use App\Services\Research\ResearchService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ResearchController extends Controller
{
    private $researchService;
    private $journalService;
    private $bannerService;

    public function __construct(ResearchService $researchService, BannerService $bannerService, JournalService $journalService)
    {
        $this->researchService = $researchService;
        $this->journalService = $journalService;
        $this->bannerService = $bannerService;
    }
    public function researchByType(Request $request)
    {
        $data['infos'] = $this->researchService->ResearchByType($request->research_type, $request->category_id);
        return view('frontend.research.research_by_type', $data);
    }

    public function researchListbyType($type_id)
    {
       
        $data['banner'] = $this->bannerService->bannerByRefId(1);
        $data['type'] = $type_id;
        $data['count_completed_research'] = count($this->researchService->ResearchByType('completed_research', $type_id));
        $data['count_ongoing_research'] = count($this->researchService->ResearchByType('ongoing_research', $type_id));

        return view('frontend.research.research_list', $data);
    }
    public function fundedResearch()
    {
        $data['banner'] = $this->bannerService->bannerByRefId(1);
        $data['type'] = 1;
        $data['infos'] = $this->researchService->ResearchByResearchType($data['type']);

        return view('frontend.research1.research_list', $data);
    }
    public function researchByYear(Request $request)
    {
        // dd($request->all());
        if ($request->year == 'All') {
            if ($request->type == 'funded-research') {
                $data['infos'] = $this->researchService->ResearchByResearchType(1);
            } else {
                $data['infos'] = $this->researchService->ResearchByResearchType($request->type);
            }
        } else {
            if ($request->type == 'funded-research') {
                $data['infos'] = $this->researchService->getByTypeAndYear(1, $request->year);
            } else {
                $data['infos'] = $this->researchService->getByTypeAndYear($request->type, $request->year);
            }
        }
        // dd($data['infos']);
        return view('frontend.research1.research_by_year', $data);
    }
    public function researchByYearFor(Request $request)
    {
        // if (Str::contains($request->type, '?page')) {
        //     // Remove the query string from the type parameter
        //     $type = strtok($request->type, '?');
        // }
        $type = $request->type;
        if ($request->year == 'All') {
            if ($type == 'chsr-research-project') {
                $data['infos'] = $this->researchService->FundedResearchByResearchFor(1);
            } elseif ($type == 'chsr-awardee') {
                $data['infos'] = $this->researchService->CompletedResearchByResearchFor(1);
            } else {
                $data['infos'] = $this->researchService->ResearchByResearchFor($request->type);
            }
        } else {
            if ($type == 'chsr-research-project') {
                $data['infos'] = $this->researchService->getFundedResearchByForAndYear(1, $request->year);
            } elseif ($type == 'chsr-awardee') {
                $data['infos'] = $this->researchService->CompletedResearchByResearchForAndYear(1, $request->year);
            } else {
                $data['infos'] = $this->researchService->getByForAndYear($request->type, $request->year);
            }
        }
        return view('frontend.research2.research_by_year', $data);
    }
    public function facultyResearchByYear(Request $request)
    {
        if ($request->year == 'All') {
                $data['infos'] = $this->researchService->ResearchByFaculty($request->faculty_id);
        } else {
                $data['infos'] = $this->researchService->ResearchByFacultyYear($request->faculty_id, $request->year);
            
        }
        return view('frontend.research2.research_by_year', $data);
    }
}
