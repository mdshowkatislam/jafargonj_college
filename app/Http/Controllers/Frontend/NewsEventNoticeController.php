<?php

namespace App\Http\Controllers\Frontend;

use App\Services\NewsEventNoticeServices;
use App\Services\BannerService;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Program;
use App\Models\ProgramCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NewsEventNoticeController extends Controller
{

   private $NewsEventNoticeServices;
   private $bannerService;
   public function __construct(NewsEventNoticeServices $NewsEventNoticeServices, BannerService $bannerService)
   {
      $this->NewsEventNoticeServices   = $NewsEventNoticeServices;
      $this->bannerService             = $bannerService;
   }

   private function programsInfo()
   {
      $details = Program::join('program_categories','program_categories.id','program_category_id')
      ->select('programs.*','program_categories.program_category')
      ->get();
      return $details;
   }

   public function newsEventNoticeFilter(Request $request)
   {
      // dd($request->all());
      $type  = $request->type;
      $title = $request->title;
      $data['category'] = '';
      $data['banner']   = $this->bannerService->bannerByRefId(1);
      $data['programs'] = $this->programsInfo();
      $data['program_categories'] = ProgramCategory::all();

      // dd($request->fromDate, $request->toDate);

      $news = News::query();

      // Filter by type
      
      $news->where('type', $type);
      

      // Filter by title if provided
      if ($request->filled('title')) {
         $news->where('title', 'like', '%' . $title . '%');
      }

      if($request->filled('categorys')){
         $news->where('category', $request->categorys);
      }

      if($request->filled('cate')){
         $news->where('program_category_id', $request->cate);
      }

      // Convert date formats and filter by date range
      $fromDate = $request->filled('fromDate') ? Carbon::createFromFormat('d-m-Y', $request->fromDate) : null;
      $toDate = $request->filled('toDate') ? Carbon::createFromFormat('d-m-Y', $request->toDate) : null;

      if ($fromDate && $toDate) {
         $news->whereBetween('date', [$fromDate->startOfDay(), $toDate->endOfDay()]);
      } elseif ($fromDate) {
         $news->where('date', '>=', $fromDate->startOfDay());
      } elseif ($toDate) {
         $news->where('date', '<=', $toDate->endOfDay());
      }

      // Get the notices value
      $noticesCat = $request->input('noticesCat');

      // Filter by notices if provided
      if ($noticesCat) {
         $news->where('category', $noticesCat); 
      }

      //$data['news'] = $news->where('is_approved', 1)->paginate(10);
      $data['news'] = $news->where('is_approved', 1)->orderBy('date', 'DESC')->get();
      // dd($data['news']);
      if ($type == 1) {
         $data['page_title'] = "News";
      } elseif ($type == 2) {
         $data['page_title'] = "Events";
      } elseif ($type == 3) {
         $data['page_title'] = "Notice";
      }
      $data['type'] = $type;
      return view('frontend.news.allSearchItem', $data);
 }

 public function newsEventNoticeSearchFilter(Request $request)
 {
   $type  = $request->search_type;
   $title = $request->title;

   $data['category'] = '';
   $data['banner']   = $this->bannerService->bannerByRefId(1);
   $data['programs'] = $this->programsInfo();
   $data['program_categories'] = ProgramCategory::all();

   $news = News::query();

   if ($request->filled('title')) {
      $news->where('title', 'like', '%' . $request->title . '%');
   }

   $data['news'] = $news->where('is_approved', 1)->where('type', $type)->orderBy('date', 'DESC')->get();

   if ($type == 1) {
      $data['page_title'] = "News";
   } elseif ($type == 2) {
      $data['page_title'] = "Events";
   } elseif ($type == 3) {
      $data['page_title'] = "Notice";
   }
   $data['type'] = $type;
   return view('frontend.news.allSearchItem', $data);
}

   public function alltypes(Request $request)
   {
      $cat_type = $request->type;

      $arraytype = ['news' => 1, 'events' => 2, 'notice' => 3, 'news_events' => 4];

      $data['type'] = $arraytype[request()->type];

      //dd($data['type']);

      $data['category'] = '';
      $data['banner']   = $this->bannerService->bannerByRefId(1);
      $data['programs'] = $this->programsInfo();
      $data['program_categories'] = ProgramCategory::all();

      if (
         $data['type'] == "2"
      ) {
         // dd(request()->type);
         $data['news'] = $this->NewsEventNoticeServices->getWithPaginate($data['type']);
      }
      if (
         $data['type'] == "4"
      ) {
         $data['news'] = $this->NewsEventNoticeServices->getFeaturedNewsEventsAll();
      } else {
         $data['news'] = $this->NewsEventNoticeServices->getWithPaginate($data['type']);
      }

      if($cat_type == 'news'){
         $data['cat_type'] = '1';
      }elseif($cat_type == 'events'){
         $data['cat_type'] = '2';
      }elseif($cat_type == 'notice'){
         $data['cat_type'] = '3';
      }
     // dd($data);
      return view('frontend.news.allnews', $data);
   }

   public function notices_cat_result(Request $request)
   {
      if($request->notices != null) {
         if($request->program != null){
            if($request->notices == 1 || $request->notices == 4) {
               $data['notices'] = News::where('type', 3)->where('category', $request->notices)->where('program_category_id', $request->program)->where('is_approved', 1)->orderBy('date', 'DESC')->get();
            } else {
               $data['notices'] = News::where('type', 3)->where('category', $request->notices)->where('is_approved', 1)->orderBy('date', 'DESC')->get();
            }
         } else {
            $data['notices'] = News::where('type', 3)->where('category', $request->notices)->where('is_approved', 1)->orderBy('date', 'DESC')->get();
         }
      } else {
         $data['notices'] = News::where('type', 3)->where('is_approved', 1)->orderBy('id', 'DESC')->orderBy('date', 'DESC')->get();
      }
      return response()->json($data);
   }

   public function new_notices_cat_result(Request $request)
   {
    $perPage = 10; // Set default items per page to 10 if not provided

    if ($request->notices != null) {
        if ($request->program != null) {
            if ($request->notices == 1 || $request->notices == 4) {
                $data['notices'] = News::where('type', 3)
                    ->where('category', $request->notices)
                    ->where('program_category_id', $request->program)
                    ->paginate($perPage); // Add pagination
            } else {
                $data['notices'] = News::where('type', 3)
                    ->where('category', $request->notices)
                    ->paginate($perPage); // Add pagination
            }
        } else {
            $data['notices'] = News::where('type', 3)
                ->where('category', $request->notices)
                ->paginate($perPage); // Add pagination
        }
    } else {
        $data['notices'] = News::where('type', 3)
            ->orderBy('id', 'DESC')
            ->paginate($perPage); // Add pagination
    }

    return response()->json($data);
   }


   public function types()
   {
      $data['url']   = request()->url;
      $data['info']  = $this->NewsEventNoticeServices->getByID(request()->id);
      $data['type']  = $data['info']['type'];
      $data['news']  = $this->NewsEventNoticeServices->getSelectedRange($data['type'], 10);

      if ($data['url'] == 'faculty_home' || $data['url'] == 'faculty_notice' || $data['url'] == 'faculty_event' || $data['url'] == 'faculty_news') {
         $data['layout'] = 'frontend.faculty.tamplate_four.partials.main';
         if (session('facult_id')) {
            $data['faculty'] = \App\Models\Faculty::find(session('facult_id'));
         } else {
            $data['faculty'] = \App\Models\Faculty::find($data['info']->faculty_id);
         }
         return view('frontend.news.types_details_common', $data);

      } elseif ($data['url'] == 'department_home' || $data['url'] == 'department_notice' || $data['url'] == 'department_event' || $data['url'] == 'department_news') {
         $data['layout'] = 'frontend.department.tamplate_four.partials.main-second';
         if (session('deprt_id')) {
            $data['department'] = \App\Models\Department::find(session('deprt_id'));
         } else {
            $data['department'] = \App\Models\Department::find($data['info']->department_id);
         }

         return view('frontend.news.types_details_common', $data);

      } elseif ($data['url'] == 'office_home' || $data['url'] == 'office_notice' || $data['url'] == 'office_event' || $data['url'] == 'office_news') {
         $data['layout'] = 'frontend.office.template.partials.main';
         if (session('off_id')) {
            $data['office'] = \App\Models\Office::find(session('off_id'));
         } else {
            $data['office'] = \App\Models\Office::find($data['info']->office_id);
         }
         return view('frontend.news.types_details_common', $data);

      } else {
         $data['layout'] = 'frontend.layouts.master-landing';
         return view('frontend.news.types_details', $data);
      }
   }


   public function featuredNewsEvents($id)
   {
      $data['banner'] = $this->bannerService->bannerByRefId(1);
      $data['featured_details'] = $this->NewsEventNoticeServices->getFeaturedNewsEventsDetails($id);
      return view('frontend.news.featured_details', $data);
   }
   public function featuredNewsEventsAll()
   {
      $data['banner'] = $this->bannerService->bannerByRefId(1);
      $data['all_featured'] = $this->NewsEventNoticeServices->getFeaturedNewsEventsAll();
      return view('frontend.news.allfeatured', $data);
   }
}
