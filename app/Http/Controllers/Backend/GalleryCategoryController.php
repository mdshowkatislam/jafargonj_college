<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AssignToClub;
use App\Models\Club;
use App\Models\Department;
use App\Models\Faculty;
use Illuminate\Http\Request;

use App\Models\GalleryCategory;
use App\Models\Office;
use App\Models\UserRole;
use App\Services\TypeService;
use Illuminate\Support\Facades\Auth;

class GalleryCategoryController extends Controller
{
    private $typeService;
    public function __construct(TypeService $typeService)
    {
        $this->typeService = $typeService;
    }
    public function index()
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $user_role = UserRole::where('user_id', $userId)->first();
            if ($userId == 1 || $user_role->role_id == 1) {
                // Admin Role
                $data['category_id'] = '';
                $data['gallery_type'] =  '';
                $data['allCategories'] = GalleryCategory::latest()->get();
            } else {
                // Other Roles
                
                switch ($user_role->role_id) {
                    case '3':
                        // Club Role = 3 & Gallery Category Club ID = 8
                        return redirect()->route('setup.gallery_category.categoryWiseGallery', 8);
                    case '8':
                        // CPC Role = 8 & Gallery Category Office ID = 7
                        return redirect()->route('setup.gallery_category.categoryWiseGallery', 7);
                    case '10':
                        // IQAC Role = 10 & Gallery Category Office ID = 7
                        return redirect()->route('setup.gallery_category.categoryWiseGallery', 7);
                    case '11':
                        // OEFCD Role = 11 & Gallery Category Office ID = 7
                        return redirect()->route('setup.gallery_category.categoryWiseGallery', 7);

                    default:
                        $data['category_id'] = '';
                        $data['gallery_type'] =  '';
                        $data['allCategories'] = collect();
                        break;
                }
            }
        }
        return view('backend.gallery_category.view', $data);
    }

    public function Add()
    {
        $userId = Auth::id();

        $data['categories']     = $this->typeService->typeList('gallery_category');
        $data['faculties']      = Faculty::where('status', 1)->get(['id', 'name']);
        $data['departments']    = Department::where('status', 1)->get(['id', 'name']);
        $data['clubs']          = Club::where('status', 1)->get(['id', 'name']);
        $data['offices']        = Office::where('status', 1)->get(['id', 'name']);


        if ($userId == 1) {
            // Admin Role
            $data['category_id'] = '';
            $data['gallery_type'] =  '';
        } else {

            // Other Roles
            $user_role = UserRole::where('user_id', $userId)->first();
            switch ($user_role->role_id) {
                case '3':
                    // Club Role = 3 & Gallery Category Club ID = 8
                    return redirect()->route('setup.gallery_category.categoryWiseGallery.add', 8);
                case '8':
                    // CPC Role = 8 & Gallery Category Office ID = 7
                    return redirect()->route('setup.gallery_category.categoryWiseGallery.add', 7);

                case '10':
                    // IQAC Role = 10 & Gallery Category Office ID = 7
                    return redirect()->route('setup.gallery_category.categoryWiseGallery.add', 7);

                case '11':
                    // OEFCD Role = 11 & Gallery Category Office ID = 7
                    return redirect()->route('setup.gallery_category.categoryWiseGallery.add', 7);


                default:
                    $data['category_id'] = '';
                    $data['gallery_type'] =  '';
                    break;
            }
        }
        return view('backend.gallery_category.add', $data);
    }

    public function Store(Request $request)
    {
        $request->validate(
            [
                'name'          => 'required',
                // 'category'      => 'required',
                'sub_category'  => 'required',
                'status'          => 'required',

            ]
        );

        $params = $request->all();

        switch ($request->sub_category) {
            case '1':
                $params['ref_id'] = $request->faculty_id;
                break;
            case '2':
                $params['ref_id'] = $request->department_id;
                break;
            case '7':
                $params['ref_id'] = $request->office_id;
                break;
            case '8':
                $params['ref_id'] = $request->club_id;
                break;

            default:
                $params['ref_id'] = null;
                break;
        }

        $params['created_by'] = Auth::id();
        $data                 = GalleryCategory::create($params);

        if ($data) {
            logData($primary_id = $data->id, $url = url()->previous(), $old_data = null, $new_data = $data, $action = 'Add Gallery Category', $created_by = Auth::id(), $updated_by = null, $deleted_by = null);
        }
        if ($request->type) {
            return redirect()->route('setup.gallery_category.categoryWiseGallery', [$request->sub_category, $request->ref_id])->with('success', 'Data Saved successfully');
        } else {
            return redirect()->route('setup.gallery_category')->with('success', 'Data Saved successfully');
        }
    }

    public function Edit($id)
    {
        $userId = Auth::id();

        $data['categories']     = $this->typeService->typeList('gallery_category');
        $data['faculties']      = Faculty::where('status', 1)->get(['id', 'name']);
        $data['departments']    = Department::where('status', 1)->get(['id', 'name']);
        $data['clubs']          = Club::where('status', 1)->get(['id', 'name']);
        $data['offices']        = Office::where('status', 1)->get(['id', 'name']);

        if ($userId == 1) {
            // Admin Role
            $data['category_id'] = '';
            $data['gallery_type'] =  '';
        } else {

            // Other Roles
            $user_role = UserRole::where('user_id', $userId)->first();
            switch ($user_role->role_id) {
                case '3':
                    // Club Role = 3 & Gallery Category Club ID = 8
                    return redirect()->route('setup.gallery_category.categoryWiseGallery.edit', [$id, 8]);

                case '8':
                    // CPC Role = 8 & Gallery Category Office ID = 7
                    return redirect()->route('setup.gallery_category.categoryWiseGallery.edit', [$id, 7]);

                case '10':
                    // IQAC Role = 10 & Gallery Category Office ID = 7
                    return redirect()->route('setup.gallery_category.categoryWiseGallery.edit', [$id, 7]);

                case '11':
                    // OEFCD Role = 11 & Gallery Category Office ID = 7
                    return redirect()->route('setup.gallery_category.categoryWiseGallery.edit', [$id, 7]);


                default:
                    $data['category_id'] = '';
                    $data['gallery_type'] =  '';
                    break;
            }
        }
        $data['editData'] = GalleryCategory::find($id);
        return view('backend.gallery_category.add', $data);
    }

    public function Update(Request $request, $id)
    {

        $request->validate([
            'name'         => 'required',
            // 'category'     => 'required',
            'status'       => 'required',
            'sub_category' => 'required',
        ]);

        $data = GalleryCategory::find($id);

        $params = $request->all();

        switch ($request->sub_category) {
            case '1':
                $params['ref_id'] = $request->faculty_id;
                break;
            case '2':
                $params['ref_id'] = $request->department_id;
                break;
            case '7':
                $params['ref_id'] = $request->office_id;
                break;
            case '8':
                $params['ref_id'] = $request->club_id;
                break;

            default:
                $params['ref_id'] = null;
                break;
        }
        $params['updated_by'] = Auth::id();
        $data->update($params);

        logData($primary_id = $id, $url = url()->previous(), $old_data = null, $new_data = $data, $action = 'Update Gallery Category', $created_by = null, $updated_by = Auth::id(), $deleted_by = null);

        if ($request->type) {
            return redirect()->route('setup.gallery_category.categoryWiseGallery', [$request->sub_category, $request->ref_id])->with('success', 'Data Saved successfully');
        } else {
            return redirect()->route('setup.gallery_category')->with('success', 'Data Saved successfully');
        }

        // return redirect()->route('setup.gallery_category')->with('success', 'Data Updated successfully');
    }

    public function Delete(Request $request)
    {
        $data               = GalleryCategory::find($request->id);
        $data->deleted_by   = Auth::id();
        $data->delete();

        return redirect()->route('setup.gallery_category')->with('success', 'Data Deleted successfully ');
    }



    public function categoryWiseGallery($category_id, $ref_id = null)
    {

        if (Auth::check()) {
            $userId = Auth::id();

            if ($userId == 1) {
                // Admin Role
                if ($ref_id) {
                    $data['allCategories'] = GalleryCategory::where('sub_category', $category_id)->where('ref_id', $ref_id)->latest()->get();
                    if ($category_id == 7) {
                        $office = Office::where('id', $ref_id)->first();
                        $data['gallery_type'] =  $office->name;
                    } else {
                        $data['gallery_type'] =  $this->typeService->singletype('gallery_category', $category_id);
                    }
                } else {
                    $data['allCategories'] = GalleryCategory::where('sub_category', $category_id)->latest()->get();
                    $data['gallery_type'] =  $this->typeService->singletype('gallery_category', $category_id);
                }
            } else {

                $user_role = UserRole::where('user_id', $userId)->first();

                switch ($user_role->role_id) {
                    case '3':
                        // Club Role = 3 & Gallery Category Club ID = 8
                        $subcategoryId = GalleryCategory::where('created_by', $userId)->first();  // Retrieve subcategory id if user has gallery category

                        if ($subcategoryId) {
                            if ($subcategoryId->sub_category == $category_id) {  // Check the requested category_id is matched to our category_id or not
                                $data['allCategories'] = GalleryCategory::where('sub_category', $subcategoryId->sub_category)
                                    ->where(function ($query) use ($userId) {
                                        $query->where('created_by', $userId);
                                        // ->orWhere('created_by', 1); // Include admin documents
                                    })
                                    ->latest()
                                    ->get();
                                $data['gallery_type'] =  $this->typeService->singletype('gallery_category', $category_id);
                            } else {
                                abort(403, 'You do not have permission to access this category.');
                            }
                        } else {
                            if ($category_id == 8) { // Club ID = 8
                                $data['allCategories'] = GalleryCategory::where('sub_category', 8)->where('created_by', 1)->latest()->get();
                                $data['gallery_type'] =  $this->typeService->singletype('gallery_category', $category_id);
                            } else {
                                abort(403, 'You do not have permission to access this category.');
                            }
                        }
                        break;

                    case '8':
                        // CPC Role = 8 & Gallery Category Office ID = 7
                        if ($category_id == 7) {
                            $office = Office::where('name', 'like', '%cpc%')->first();
                            $data['allCategories'] = GalleryCategory::where('sub_category', $category_id)->where('ref_id', $office->id)->latest()->get();
                            $data['gallery_type'] = $office->name;
                        } else {
                            abort(403, 'You do not have permission to access this category.');
                        }
                        break;

                    case '10':
                        // IQAC Role = 10 & Gallery Category Office ID = 7
                        if ($category_id == 7) {
                            $office = Office::where('name', 'like', '%iqac%')->first();
                            $data['allCategories'] = GalleryCategory::where('sub_category', $category_id)->where('ref_id', $office->id)->latest()->get();
                            $data['gallery_type'] = $office->name;
                        } else {
                            abort(403, 'You do not have permission to access this category.');
                        }
                        break;

                    case '11':
                        // OEFCD Role = 11 & Gallery Category Office ID = 7
                        if ($category_id == 7) {
                            $office = Office::where('name', 'like', '%oefcd%')->first();
                            $data['allCategories'] = GalleryCategory::where('sub_category', $category_id)->where('ref_id', $office->id)->latest()->get();
                            $data['gallery_type'] = $office->name;
                        } else {
                            abort(403, 'You do not have permission to access this category.');
                        }
                        break;

                    default:
                        $data['allCategories'] = collect();
                        break;
                }
            }
        } else {
            $data['allCategories'] = collect();
        }

        $data['category_id'] = $category_id;
        $data['ref_id'] =  $ref_id;

        return view('backend.gallery_category.view ', $data);
    }

    public function addCategoryWiseGallery($category_id, $ref_id = null)
    {

        $user = Auth::user();

        $data['categories']     = $this->typeService->typeList('gallery_category');
        $data['category_id']    = $category_id;
        $data['ref_id']         = $ref_id;

        $data['faculties']      = Faculty::where('status', 1)->get(['id', 'name']);
        $data['departments']    = Department::where('status', 1)->get(['id', 'name']);

        $offices = Office::where('status', 1);


        $clubs  = Club::where('status', 1);


        if ($user->id != 1) {

            // Other Roles
            $user_role = UserRole::where('user_id', $user->id)->first();
            switch ($user_role->role_id) {
                case '3':
                    // Club Role = 3 & Gallery Category Club ID = 8
                    if ($category_id == 8) {

                        $data['gallery_type'] =  $this->typeService->singletype('gallery_category', $category_id);
                        $assign_club = AssignToClub::where('club_member_id', $user->profile_id)->get();
                        if ($assign_club) {
                            $club_ids = $assign_club->pluck('club_id')->toArray();
                            $data['clubs'] = $clubs->whereIn('id', $club_ids);
                        }
                    } else {
                        abort(403, 'You do not have permission to access this category.');
                    }
                    break;

                case '8':
                    // CPC Role = 8 & Gallery Category Office ID = 7
                    if ($category_id == 7) {
                        $office = Office::where('name', 'like', '%cpc%')->first();
                        $data['offices'] = $offices->where('id', $office->id);
                        $data['gallery_type'] =  $office->name;
                    } else {
                        abort(403, 'You do not have permission to access this category.');
                    }
                    break;

                case '10':
                    // IQAC Role = 10 & Gallery Category Office ID = 7
                    if ($category_id == 7) {
                        $office = Office::where('name', 'like', '%iqac%')->first();
                        $data['offices'] = $offices->where('id', $office->id);
                        $data['gallery_type'] =  $office->name;
                    } else {
                        abort(403, 'You do not have permission to access this category.');
                    }
                    break;

                case '11':
                    // OEFCD Role = 11 & Gallery Category Office ID = 7
                    if ($category_id == 7) {
                        $office = Office::where('name', 'like', '%oefcd%')->first();
                        $data['offices'] = $offices->where('id', $office->id);
                        $data['gallery_type'] =  $office->name;
                    } else {
                        abort(403, 'You do not have permission to access this category.');
                    }
                    break;

                default:
                    break;
            }
        } else {
            if ($ref_id) {
                if ($category_id == 7) {
                    $office = Office::where('id', $ref_id)->first();
                    $data['gallery_type'] =  $office->name;
                }
            } else {
                $data['gallery_type'] =  $this->typeService->singletype('gallery_category', $category_id);
            }
        }

        $data['clubs'] = $clubs->latest()->get(['id', 'name']);
        $data['offices'] = $offices->get(['id', 'name']);


        return view('backend.gallery_category.add', $data);
    }
    public function editCategoryWiseGallery($id, $category_id, $ref_id = null)
    {
        $user = Auth::user();

        $clubs = Club::where('status', 1);
        $offices = Office::where('status', 1);


        if ($user->id == 1) {
            $data['editData'] = GalleryCategory::find($id);

            if ($ref_id) {
                if ($category_id == 7) {
                    $office = Office::where('id', $ref_id)->first();
                    $data['gallery_type'] =  $office->name;
                }
            } else {
                $data['gallery_type']   =  $this->typeService->singletype('gallery_category', $category_id);
            }
        } else {

            $user_role = UserRole::where('user_id', $user->id)->first();

            switch ($user_role->role_id) {
                case '3':
                    // Club Role = 3 & Gallery Category Club ID = 8

                    if ($category_id == 8) {
                        $data['editData'] = GalleryCategory::where('id', $id)->where('sub_category', $category_id)
                            ->where(function ($query) use ($user) {
                                $query->where('created_by', $user->id);
                            })->firstOrFail();

                        $assign_club = AssignToClub::where('club_member_id', $user->profile_id)->get();
                        if ($assign_club) {
                            $club_ids = $assign_club->pluck('club_id')->toArray();
                            $data['clubs'] = $clubs->whereIn('id', $club_ids);
                        }
                        $data['gallery_type']   =  $this->typeService->singletype('gallery_category', $category_id);
                    } else {
                        abort(403, 'You do not have permission to access this category.');
                    }

                    break;

                case '8':
                    // CPC Role = 8 & Gallery Category Office ID = 7
                    if ($category_id == 7) {
                        $data['editData'] = GalleryCategory::where('id', $id)->where('sub_category', $category_id)->firstOrFail();
                        $office = Office::where('name', 'like', '%cpc%')->first();
                        $data['offices'] = $offices->where('id', $office->id);
                        $data['gallery_type'] =  $office->name;
                    } else {
                        abort(403, 'You do not have permission to access this category.');
                    }

                    break;

                case '10':
                    // IQAC Role = 10 & Gallery Category Office ID = 7
                    if ($category_id == 7) {
                        $data['editData'] = GalleryCategory::where('id', $id)->where('sub_category', $category_id)->firstOrFail();
                        $office = Office::where('name', 'like', '%iqac%')->first();
                        $data['offices'] = $offices->where('id', $office->id);
                        $data['gallery_type'] =  $office->name;
                    } else {
                        abort(403, 'You do not have permission to access this category.');
                    }

                    break;

                case '11':
                    // OEFCD Role = 11 & Gallery Category Office ID = 7
                    if ($category_id == 7) {
                        $data['editData'] = GalleryCategory::where('id', $id)->where('sub_category', $category_id)->firstOrFail();
                        $office = Office::where('name', 'like', '%oefcd%')->first();
                        $data['offices'] = $offices->where('id', $office->id);
                        $data['gallery_type'] =  $office->name;
                    } else {
                        abort(403, 'You do not have permission to access this category.');
                    }

                    break;
                default:
                    break;
            }
        }
        $data['categories']     = $this->typeService->typeList('gallery_category');
        $data['category_id']    = $category_id;
        $data['ref_id']         =  $ref_id;


        $data['faculties']      = Faculty::where('status', 1)->get(['id', 'name']);
        $data['departments']    = Department::where('status', 1)->get(['id', 'name']);

        $data['clubs']          = $clubs->latest()->get(['id', 'name']);
        $data['offices']        = $offices->get(['id', 'name']);

        return view('backend.gallery_category.add', $data);
    }
}
