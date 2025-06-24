<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use RahulHaque\Filepond\Facades\Filepond;
use App\Models\Gallery;
use App\Models\GalleryCategory;
use App\Models\Image;
use App\Models\Office;
use App\Models\UserRole;
use App\Services\TypeService;
use Illuminate\Support\Facades\Auth;

class PhotoController extends Controller
{
    private $typeService;
    public function __construct(TypeService $typeService)
    {
        $this->typeService = $typeService;
    }
    public function index($category_id, $type = null, $ref_id = null)
    {
        if (Auth::check()) {

            $gallery_category = GalleryCategory::find($category_id);
            $data['gallery_type'] = $gallery_category->name;

            $userId = Auth::id();
            $user_role = UserRole::where('user_id', $userId)->first();
            if ($userId == 1 || $user_role->role_id == 1) {
                $data['galleries'] = Gallery::where('gallery_category_id', $category_id)->get();
            } else {
                switch ($user_role->role_id) {
                    case '3':
                        // Club Role = 3 & Gallery Category Club ID = 8
                        if ($type == 8) {
                            $data['galleries'] = Gallery::where('gallery_category_id', $category_id)
                                ->where(function ($query) use ($userId) {
                                    $query->where('created_by', $userId);
                                })
                                ->get();
                        } else {
                            abort(403, 'You do not have permission to access this page.');
                        }
                        break;

                    case '8':
                        // CPC Role = 8 & Gallery Category Office ID = 7
                        if ($type == 7) {
                            $data['galleries'] = Gallery::where('gallery_category_id', $category_id)
                                ->where(function ($query) use ($userId) {
                                    $query->where('created_by', $userId);
                                })
                                ->get();
                        } else {
                            abort(403, 'You do not have permission to access this page.');
                        }
                        break;

                    case '10':
                        // IQAC Role = 10 & Gallery Category Office ID = 7
                        if ($type == 7) {
                            $data['galleries'] = Gallery::where('gallery_category_id', $category_id)
                                ->where(function ($query) use ($userId) {
                                    $query->where('created_by', $userId);
                                })
                                ->get();
                        } else {
                            abort(403, 'You do not have permission to access this page.');
                        }
                        break;

                    case '11':
                        // OEFCD Role = 11 & Gallery Category Office ID = 7
                        if ($type == 7) {
                            $data['galleries'] = Gallery::where('gallery_category_id', $category_id)
                                ->where(function ($query) use ($userId) {
                                    $query->where('created_by', $userId);
                                })
                                ->get();
                        } else {
                            abort(403, 'You do not have permission to access this page.');
                        }
                        break;

                    default:
                        $data['galleries'] = collect();
                        break;
                }
            }
        } else {
            $data['galleries'] = collect(); // Unauthorized User
        }

        $data['category_id'] = $category_id;
        $data['type'] = $type;
        $data['ref_id'] =  $ref_id;

        return view('backend.photo.view', $data);
    }

    public function add($category_id, $type = null, $ref_id = null)
    {

        $userId = Auth::id();

        $gallery_category = GalleryCategory::find($category_id);
        $data['gallery_type'] = $gallery_category->name;
        $data['category_id'] = $category_id;
        $data['type'] = $type;
        $data['ref_id'] =  $ref_id;

        if ($userId == 1) {
        } else {
            $user_role = UserRole::where('user_id', $userId)->first();
            switch ($user_role->role_id) {
                case '3':
                    // Club Role = 3 & Gallery Category Club ID = 8
                    if ($type == 8) {

                        return view('backend.photo.add', $data);
                    } else {
                        abort(403, 'You do not have permission to access this category.');
                    }
                    break;
                case '8':
                    // CPC Role = 8 & Gallery Category Office ID = 7
                    if ($type == 7) {

                        return view('backend.photo.add', $data);
                    } else {
                        abort(403, 'You do not have permission to access this category.');
                    }
                    break;

                case '10':
                    // IQAC Role = 10 & Gallery Category Office ID = 7
                    if ($type == 7) {

                        return view('backend.photo.add', $data);
                    } else {
                        abort(403, 'You do not have permission to access this category.');
                    }
                    break;

                case '11':
                    // OEFCD Role = 11 & Gallery Category Office ID = 7
                    if ($type == 7) {

                        return view('backend.photo.add', $data);
                    } else {
                        abort(403, 'You do not have permission to access this category.');
                    }
                    break;

                default:
                    break;
            }
        }


        return view('backend.photo.add', $data);
    }

    public function cropImageSave(Request $request)
    {
        $folderPath = public_path('upload/gallery_images/');
        $image_parts = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $cropImageName = uniqid() . '.png';
        $imageFullPath = $folderPath . $cropImageName;
        file_put_contents($imageFullPath, $image_base64);
        //  $saveFile = new Picture;
        //  $saveFile->name = $cropImageName;
        //  $saveFile->save();
        session()->put('crop_image_name', $cropImageName);

        return response()->json(['success' => 'Crop Image Uploaded Successfully']);
    }

    public function StoreImage(Request $request)
    {
        // return $request->all();
        $this->validate($request, [
            'gallery.*' => Rule::filepond([
                'required',
                'image',
                'max:2000'
            ])
        ]);
        //echo "test";
        $galleryName = 'gallery-' . auth()->id();

        $fileInfos = Filepond::field($request->gallery)
            ->moveTo('galleries/' . $galleryName);
        //dd($fileInfos);
    }


    public function Store(Request $request, $category_id)
    {

        $request->validate(
            [
                'title' => 'required',
                'image' => 'required|mimes:jpg,jpeg,png',
            ],
            [
                'gallery_category_id.required' => 'Select Gallery Category',
            ]
        );

        $params = $request->all();
        $params['created_by']   = Auth::id();
        $img = $request->file('image');
        if ($img) {
            if (!session()->get('crop_image_name')) {
                $imgName = date('YmdHi') . $img->getClientOriginalName();
                $img->move('upload/gallery_images/', $imgName);
                $params['image'] = $imgName;
            } else {
                $params['image'] = session()->get('crop_image_name');
                session()->remove('crop_image_name');
            }
        }
        if ($request->has('is_featured')) {
            $params['is_featured'] = 1;
        } else {
            $params['is_featured'] = 0;
        }
        $data = Gallery::create($params);
        if ($data) {
            logData($primary_id = $data->id, $url = url()->previous(), $old_data = null, $new_data = $data, $action = 'Add Photo', $created_by = Auth::id(), $updated_by = null, $deleted_by = null);
        }
        return redirect()->route('setup.photo', [$category_id, $request->gallery_type, $request->ref_id])->with('success', 'Data Saved successfully');
    }

    public function Edit($category_id, $id, $type = null, $ref_id = null)
    {

        $userId = Auth::id();

        $data['category_id'] = $category_id;
        $data['type'] = $type;
        $data['ref_id'] =  $ref_id;

        $gallery_category = GalleryCategory::find($category_id);
        $data['gallery_type'] = $gallery_category->name;

        if ($userId == 1) {
        } else {
            $user_role = UserRole::where('user_id', $userId)->first();
            switch ($user_role->role_id) {
                case '3':
                    // Club Role = 3 & Gallery Category Club ID = 8
                    if ($type == 8) {
                        $data['editData'] = Gallery::where('id', $id)->where('gallery_category_id', $category_id)
                            ->where(function ($query) use ($userId) {
                                $query->where('created_by', $userId)
                                    ->orWhere('created_by', 1); // Include admin photos
                            })->firstOrFail();



                        return view('backend.photo.add', $data);
                    } else {
                        abort(403, 'You do not have permission to access this category.');
                    }
                    break;

                case '8':
                    // CPC Role = 8 &  Gallery Category Office ID = 7
                    if ($type == 7) {
                        $data['editData'] = Gallery::where('id', $id)->where('gallery_category_id', $category_id)->firstOrFail();

                        return view('backend.photo.add', $data);
                    } else {
                        abort(403, 'You do not have permission to access this category.');
                    }
                    break;

                case '10':
                    // IQAC Role = 10 &  Gallery Category Office ID = 7
                    if ($type == 7) {
                        $data['editData'] = Gallery::where('id', $id)->where('gallery_category_id', $category_id)->firstOrFail();

                        return view('backend.photo.add', $data);
                    } else {
                        abort(403, 'You do not have permission to access this category.');
                    }
                    break;

                case '11':
                    // OEFCD Role = 11 &  Gallery Category Office ID = 7
                    if ($type == 7) {
                        $data['editData'] = Gallery::where('id', $id)->where('gallery_category_id', $category_id)->firstOrFail();

                        return view('backend.photo.add', $data);
                    } else {
                        abort(403, 'You do not have permission to access this category.');
                    }
                    break;

                default:
                    break;
            }
        }


        $data['editData'] = Gallery::where('id', $id)->where('gallery_category_id', $category_id)->firstOrFail();

        return view('backend.photo.add', $data);
    }

    public function Update(Request $request, $category_id, $id)
    {

        $request->validate([
            'title' => 'required',
            'image' => 'mimes:jpg,jpeg,png',
        ]);

        $data = Gallery::find($id);
        $params = $request->all();
        $params['updated_by']   = Auth::id();
        $img = $request->file('image');
        if ($img) {
            //dd(session()->get('crop_image_name'));
            if (file_exists(public_path('upload/gallery_images/' . $data->image))) {
                @unlink(public_path('upload/gallery_images/' . $data->image));
            }
            if (!session()->get('crop_image_name')) {
                $imgName = date('YmdHi') . $img->getClientOriginalName();
                $img->move('upload/gallery_images/', $imgName);
                $params['image'] = $imgName;
            } else {
                $params['image'] = session()->get('crop_image_name');
                session()->remove('crop_image_name');
            }
        }
        if ($request->has('is_featured')) {
            $params['is_featured'] = 1;
        } else {
            $params['is_featured'] = 0;
        }
        $data->update($params);
        logData($primary_id = $id, $url = url()->previous(), $old_data = null, $new_data = $data, $action = 'Update Photo', $created_by = null, $updated_by = Auth::id(), $deleted_by = null);
        return redirect()->route('setup.photo', [$category_id, $request->gallery_type, $request->ref_id])->with('success', 'Data Updated successfully');
    }

    public function Delete(Request $request)
    {
        $data = Gallery::find($request->id);
        $data->deleted_by = Auth::id();
        if ($data->image) {
            if (file_exists(public_path('upload/gallery_images/' . $data->image))) {
                @unlink(public_path('upload/gallery_images/' . $data->image));
            }
        }
        $data->delete();
        logData($primary_id = $request->id, $url = url()->previous(), $old_data = null, $new_data = $data, $action = 'Delete Photo', $created_by = null, $updated_by = null, $deleted_by = Auth::id());
        return redirect()->back()->with('success', 'Data Deleted successfully');
    }

    public function PhotosUpload(Request $request)
    {
        return ($request->all());
    }
}
