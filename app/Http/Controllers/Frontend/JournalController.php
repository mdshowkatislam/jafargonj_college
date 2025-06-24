<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\Article\ArticleService;
use App\Services\BannerService;
use App\Services\Journal\JournalService;
use Illuminate\Http\Request;

class JournalController extends Controller
{
    private $journalService;
    private $bannerService;
    private $articleService;

    public function __construct(BannerService $bannerService, JournalService $journalService, ArticleService $articleService)
    {
        $this->journalService = $journalService;
        $this->bannerService = $bannerService;
        $this->articleService = $articleService;
    }
    public function journalList()
    {
        $data['banner'] = $this->bannerService->bannerByRefId(1);
        // $data['count_completed_research'] = count($this->journalService->JournalList());
        $data['journalList'] = $this->journalService->JournalList();
        //dd($data);
        return view('frontend.journal.journal_list_old', $data);
    }
    public function journalDetails(Request $request, $id)
    {
        $data['banner'] = $this->bannerService->bannerByRefId(1);
        $data['info'] = $this->journalService->getByID($id);
        $data['articles'] = $this->articleService->getByJournal($id);
        // dd($data['articles']);
        return view('frontend.journal.journal_details', $data);
    }
    public function journalListByYear(Request $request)
    {
        if($request->year == 'All'){
            if($request->faculty_id == 'journal-list'){
                $data['infos'] = $this->journalService->JournalList();
            }
            else{
                $data['infos'] = $this->journalService->getByFaculty($request->faculty_id);
            }
        }
        else{
            if($request->faculty_id == 'journal-list'){
                $data['infos'] = $this->journalService->getByYear($request->year);
            }
            else{
                $data['infos'] = $this->journalService->getByFacultyYear($request->faculty_id, $request->year);
            }
        }
        return view('frontend.journal.journal_by_year', $data);
    }
    public function journalListByFaculty($faculty_id)
    {
        $data['banner'] = $this->bannerService->bannerByRefId(1);

        $data['infos'] = $this->journalService->getByFaculty($faculty_id);
        return view('frontend.journal.journal_list', $data);
    }
}
