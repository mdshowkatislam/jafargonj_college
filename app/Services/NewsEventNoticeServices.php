<?php

namespace App\Services;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\IService;
use Carbon\Carbon;

/**
 * Class NewsEventNoticeServices
 * @package App\Services
 */
class NewsEventNoticeServices
{

    public function getAll()
    {
        try {
            $data = News::where('is_approved', 1)->get();
            return $data;
        } catch (\Exception $e) {
            $d['error'] = 'Something wrong';
            return response()->json(["msg" => $e->getMessage()]);
        }
    }
    /**
     * @param type "News =1, Event =2, Notice =3"
     * @param take "how many row you want"
     */
    public function getSelectedRange($type, $take, $is_upcoming = 0)
    {
        
        $current_date = Carbon::now()->toDateString();

        $query = News::where('type', $type)->where('is_approved', 1)->where('display_on_scrollbar', 1)->orderBy('date', 'DESC')->latest()->take($take);

        // if ($is_upcoming) {
        //     $query->whereDate('end_date', '>=', $current_date);
        // };

        $data = $query->get();
        
       return $data;
    }

    public function getAffiliationNotice($type, $take)
    {
        $query = News::where('type', $type)->where('is_approved', 1)->where('category', 5)->orderBy('date', 'DESC')->latest()->take($take);

        $data = $query->get();
        
        return $data;
    }

    public function result_and_notice($type, $category, $take)
    {
        $query = News::where('type', $type)->where('category', $category)->where('is_approved', 1)->where('display_on_scrollbar', 1)->orderBy('date', 'DESC')->latest()->take($take);
        $data  = $query->get();
        return $data;
    }

    public function getProgramsNotice($type, $take)
    {
        $query = News::where('type', $type)->where('is_approved', 1)->where('category', 3)->latest()->take($take);

        $data = $query->get();
        
        return $data;
    }
    public function getFeaturedNewsEventsRange($take, $is_upcoming = 0)
    {
       
        try {
            $current_date = Carbon::now()->toDateString();

            $query = News::where('is_approved', 1)->where('is_featured', 1)->latest()->take($take);

            // if ($is_upcoming) {
            //     $query->whereDate('end_date', '<=', $current_date);
            // };

            $data = $query->get();
            // dd($data);
            return $data;
        } catch (\Exception $e) {
            $d['error'] = 'Something wrong';
            return response()->json(["msg" => $e->getMessage()]);
        }
    }

    public function getFeaturedNewsEventsAll($is_upcoming = 0)
    {
        try {
            $current_date = Carbon::now()->toDateString();

            $query = News::where('is_approved', 1)->where('is_featured', 1)->inRandomOrder();
            // dd($query->toArray());

            if ($is_upcoming) {
                $query->whereDate('end_date', '<=', $current_date);
            };

            $data = $query->paginate(10);

            return $data;
        } catch (\Exception $e) {
            $d['error'] = 'Something wrong';
            return response()->json(["msg" => $e->getMessage()]);
        }
    }
    
    public function getFeaturedNewsEventsDetails($id)
    {
        $data = news::find($id);
        return $data;
    }

    /**
     * @param type "News =1, Event =2, Notice =3"
     */
    public function getWithPaginate($type, $is_upcoming = 0)
    {
        
        try {
            // $current_date = Carbon::now()->toDateString();

            $query = News::where('type', $type)->where('is_approved', 1)->orderBy('date', 'DESC')->latest();

            // if ($is_upcoming) {
            //     $query->whereDate('end_date', '>=', $current_date);
            // };
            // dd($query->get());
            $data = $query->paginate(10);
            // $data = $query->get();
            // dd($data->toArray());

            return $data;
        } catch (\Exception $e) {
            $d['error'] = 'Something wrong';
            return response()->json(["msg" => $e->getMessage()]);
        }
    }

    /**
     * @param type "News =1, Event =2, Notice =3"
     * @param take "how many row you want"
     * @param faculty_id faculty wise"
     */
    public function getNewsEventsNotice($type, $take, $faculty_id, $is_upcoming = 0)
    {
        try {

            $current_date = Carbon::now()->toDateString();

            $query = News::where('type', $type)
                // ->where('faculty_id', $faculty_id)
                ->where(function ($query) use ($faculty_id) {
                    $query->where('faculty_id', $faculty_id)
                        ->orWhere('faculty_id', 0);
                })
                ->where('is_approved', 1)
                ->orderBy('date', 'DESC')
                ->take($take);

            // if ($is_upcoming) {
            //     $query->whereDate('end_date', '>=', $current_date);
            // };

            $data = $query->get();
            return $data;
        } catch (\Exception $e) {
            $d['error'] = 'Something wrong';
            return response()->json(["msg" => $e->getMessage()]);
        }
    }
    public function getFacultNewsEventsNotice($type, $take, $faculty_id, $is_upcoming = 0)
    {
        try {

            $current_date = Carbon::now()->toDateString();

            $query = News::where('type', $type)
                // ->where('faculty_id', $faculty_id)
                ->where(function ($query) use ($faculty_id) {
                    $query->where('faculty_id', $faculty_id)
                        ->orWhere('faculty_id', 0);
                })
                ->where('is_approved', 1)
                ->orderBy('date', 'DESC')
                ->take($take);

            // if ($is_upcoming) {
            //     $query->whereDate('end_date', '>=', $current_date);
            // };

            $data = $query->paginate(10);
            return $data;
        } catch (\Exception $e) {
            $d['error'] = 'Something wrong';
            return response()->json(["msg" => $e->getMessage()]);
        }
    }
    /**
     * @param type "News =1, Event =2, Notice =3"
     * @param take "how many row you want"
     * @param department_id department wise"
     * @param faculty_id faculty wise"
     * @param is_upcoming for upcoming event"
     */
    public function getDeptNewsEventsNotice($type, $take, $department_id, $faculty_id, $is_upcoming = 0)
    {
        // dd($faculty_id);
        try {
            $current_date = Carbon::now()->toDateString();

            $query = News::where('type', $type)
                // ->where('faculty_id', $faculty_id)
                ->where(function ($query) use ($faculty_id) {
                    $query->where('faculty_id', $faculty_id)
                        ->orWhere('faculty_id', 0);
                })
                ->where(function ($query) use ($department_id) {
                    $query->where('department_id', $department_id)
                        ->orWhere('department_id', 0);
                })
                ->where('is_approved', 1)
                ->orderBy('date', 'DESC')
                ->take($take);

            // if ($is_upcoming) {
            //     $query->whereDate('end_date', '>=', $current_date);
            // }

            $data = $query->paginate(10);

            return $data;
        } catch (\Exception $e) {
            $d['error'] = 'Something wrong';
            return response()->json(["msg" => $e->getMessage()]);
        }
    }
    /**
     * @param type "News =1, Event =2, Notice =3"
     * @param take "how many row you want"
     * @param office_id Office wise"
     */
    public function getOfficeNewsEventsNotice($type, $take, $office_id, $is_upcoming = 0)
    {
        try {

            $current_date = Carbon::now()->toDateString();

            $query = News::where('type', $type)
                ->where(function ($query) use ($office_id) {
                    $query->where('office_id', $office_id)
                        ->orWhere('office_id', 0);
                })
                ->where('is_approved', 1)
                ->orderBy('date', 'DESC')
                ->take($take);

            // if ($is_upcoming) {
            //     $query->whereDate('end_date', '>=', $current_date);
            // }

            $data = $query->paginate(10);

            return $data;
        } catch (\Exception $e) {
            $d['error'] = 'Something wrong';
            return response()->json(["msg" => $e->getMessage()]);
        }
    }
    public function getHallNewsEventsNotice($type, $take, $hall_id, $is_upcoming = 0)
    {
        try {

            $current_date = Carbon::now()->toDateString();

            $query = News::where('type', $type)
                ->where(function ($query) use ($hall_id) {
                    $query->where('hall_id', $hall_id)
                        ->orWhere('hall_id', 0);
                })
                ->where('is_approved', 1)
                ->orderBy('date', 'DESC')
                ->take($take);

            // if ($is_upcoming) {
            //     $query->whereDate('end_date', '>=', $current_date);
            // }

            $data = $query->get();

            return $data;
        } catch (\Exception $e) {
            $d['error'] = 'Something wrong';
            return response()->json(["msg" => $e->getMessage()]);
        }
    }
    public function getNewsEventsNoticeForOffice($type, $take, $office_id)
    {
        try {
            $data = News::where('type', $type)
                ->where(function ($query) use ($office_id) {
                    $query->where('office_id', $office_id)
                        ->orWhere('office_id', 0);
                })
                ->where('is_approved', 1)
                ->orderBy('date', 'DESC')
                ->paginate($take);
            return $data;
        } catch (\Exception $e) {
            $d['error'] = 'Something wrong';
            return response()->json(["msg" => $e->getMessage()]);
        }
    }



    public function getNews()
    {
        try {
            $data = News::where(['faculty_id' => 3, 'type' => 1])
                ->get();
            return $data;
        } catch (\Exception $e) {
            $d['error'] = 'Something wrong';
            return response()->json(["msg" => $e->getMessage()]);
        }
    }


    public function getEvent()
    {
        try {
            $data = News::where(['faculty_id' => 3, 'type' => 2])
                ->get();
            return $data;
        } catch (\Exception $e) {
            $d['error'] = 'Something wrong';
            return response()->json(["msg" => $e->getMessage()]);
        }
    }

    public function getClubNewsNoticeEvent($type, $take, $club_id, $is_upcoming = 0)
    {
        try {
            $current_date = Carbon::now()->toDateString();

            $query = News::where('type', $type)
                ->where(function ($query) use ($club_id) {
                    $query->where('club_id', $club_id)
                        ->orWhere('club_id', 0);
                })
                ->where('is_approved', 1)
                ->orderBy('date', 'DESC')
                ->take($take);

            // if ($is_upcoming) {
            //     $query->whereDate('end_date', '>=', $current_date);
            // };

            $data = $query->get();

            // $data = News::where('type', $type)
            //     ->where(function ($query) use ($club_id) {
            //         $query->where('club_id', $club_id)
            //             ->orWhere('club_id', 0);
            //     })
            //     ->where('is_approved', 1)
            //     ->latest()
            //     ->take($take)
            //     ->get();

            return $data;
        } catch (\Exception $e) {
            $d['error'] = 'Something wrong';
            return response()->json(["msg" => $e->getMessage()]);
        }
    }

    public function getAlumniNewsNoticeEvent($type, $take, $alumni_id, $is_upcoming = 0)
    {
        try {
            $current_date = Carbon::now()->toDateString();

            $query = News::where('type', $type)
                ->where(function ($query) use ($alumni_id) {
                    $query->where('alumni_id', $alumni_id)
                        ->orWhere('alumni_id', 0);
                })
                ->where('is_approved', 1)
                ->orderBy('date', 'DESC')
                ->take($take);

            // if ($is_upcoming) {
            //     $query->whereDate('end_date', '>=', $current_date);
            // };

            $data = $query->get();

            // $data = News::where('type', $type)
            //     ->where(function ($query) use ($club_id) {
            //         $query->where('club_id', $club_id)
            //             ->orWhere('club_id', 0);
            //     })
            //     ->where('is_approved', 1)
            //     ->latest()
            //     ->take($take)
            //     ->get();

            return $data;
        } catch (\Exception $e) {
            $d['error'] = 'Something wrong';
            return response()->json(["msg" => $e->getMessage()]);
        }
    }

    public function getClubEvent()
    {
        try {
            $data = News::where('type', 2)->orderBy('club_id', 'desc')->take(4)->get();
            return $data;
        } catch (\Exception $e) {
            $d['error'] = 'Something wrong';
            return response()->json(["msg" => $e->getMessage()]);
        }
    }
    public function getAlumniEvent()
    {
        try {
            $data = News::where('type', 2)->orderBy('alumni_id', 'desc')->take(4)->get();
            return $data;
        } catch (\Exception $e) {
            $d['error'] = 'Something wrong';
            return response()->json(["msg" => $e->getMessage()]);
        }
    }


    public function getByID($id)
    {
        $data = news::find($id);

        return $data;
    }
}
