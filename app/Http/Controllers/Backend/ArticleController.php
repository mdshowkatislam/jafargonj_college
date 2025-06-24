<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Services\Article\ArticleService;
use App\Services\BannerService;
use App\Services\Journal\JournalService;
use App\Services\Research\ResearchService;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    private $articleService;
    private $bannerService;
    private $journalService;
    private $researchService;

    public function __construct(BannerService $bannerService, ArticleService $articleService, JournalService $journalService, ResearchService $researchService)
    {
        $this->articleService = $articleService;
        $this->bannerService = $bannerService;
        $this->journalService = $journalService;
        $this->researchService = $researchService;
    }

    public function index($type, $ref_id)
    {
        if($type==1){
            $data['info'] = $this->journalService->getByID($ref_id);
            $data['articles']  = $this->articleService->getByJournal($ref_id);
        }
        elseif($type==2){
            $data['info'] = $this->researchService->getByID($ref_id);
            $data['articles']  = $this->articleService->getByResearch($ref_id);
        }
        $data['type'] = $type;
        return view('backend.article.view', $data);
    }
    public function add($type, $ref_id)
    {
        if($type==1){
            $data['info'] = $this->journalService->getByID($ref_id);
        }
        elseif($type==2){
            $data['info'] = $this->researchService->getByID($ref_id);
        }
        $data['type'] = $type;
        
        return view('backend.article.add', $data);
    }
    public function store(Request $request, $type, $ref_id)
    {
        $request->validate([
            'title' => 'required',
            'attachment' => 'required|mimes:pdf,doc,docx',
        ]);
        // dd($request->all());

        $this->articleService->create($request);
        return redirect()->route('news.article.list', [$type, $ref_id])->with('success', 'Data successfully inserted!');
    }

    public function edit( $type, $ref_id, $id)
    {
        if($type==1){
            $data['info'] = $this->journalService->getByID($ref_id);
        }
        elseif($type==2){
            $data['info'] = $this->researchService->getByID($ref_id);
        }
        $data['type'] = $type;
        $data['editData'] = $this->articleService->getByID($id);

        return view('backend.article.add', $data);
    }

    public function update(Request $request, $type, $ref_id, $id)
    {
        $request->validate([
            'title' => 'required',
            'attachment' => 'mimes:pdf,doc,docx',
        ]);

        $this->articleService->update($request, $id);
        return redirect()->route('news.article.list', [$type, $ref_id])->with('success', 'Data successfully updated!');
    }
}
