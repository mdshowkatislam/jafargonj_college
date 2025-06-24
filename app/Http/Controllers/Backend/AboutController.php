<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\VcInformation;
use Auth;
use Image;
use App\Helpers\ImageHelper;

class AboutController extends Controller
{
    public function aboutView()
    {
        $data['count'] = About::count();
        $data['editData'] = About::where('status','1')->first();
        return view('backend.about.view',$data);
    }

    public function aboutAdd()
    {
        return view('backend.homepage.about.about_add');
    }

    public function aboutStore(Request $request)
    {

        $request->validate([
            'banner_image' => 'mimes:jpg,jpeg,png',
            'objective_image' => 'mimes:jpg,jpeg,png',
            'core_value_image' => 'mimes:jpg,jpeg,png',
            'about_image_1' => 'mimes:jpg,jpeg,png',
            'about_image_2' => 'mimes:jpg,jpeg,png',
        ]);

        $data = $request->all();
        if ($img = $request->file('about_image_1')) {
            $imgName = date('YmdHi').$img->getClientOriginalName();
            $img->move('upload/about/', $imgName);
            $image=Image::make(public_path('upload/about/').$imgName);
            $image->resize(640,471)->save(public_path('upload/about/').$imgName);
            $data['about_image_1'] = $imgName;
        }
        
        if ($img = $request->file('about_image_2')) {
            $imgName = date('YmdHi').$img->getClientOriginalName();
            $img->move('upload/about/', $imgName);
            $image=Image::make(public_path('upload/about/').$imgName);
            $image->resize(640,471)->save(public_path('upload/about/').$imgName);
            $data['about_image_2'] = $imgName;
        }
        if ($img = $request->file('banner_image')) {
            $imgName = date('YmdHi') . $img->getClientOriginalName();
            $img->move('upload/about/', $imgName);
            $image = Image::make(public_path('upload/about/') . $imgName);
            $image->resize(1920, 300)->save(public_path('upload/about/') . $imgName);
            $data['banner_image'] = $imgName;
        }
        if ($img = $request->file('objective_image')) {
            $imgName = date('YmdHi') . $img->getClientOriginalName();
            $img->move('upload/about/', $imgName);
            $image = Image::make(public_path('upload/about/') . $imgName);
            $image->resize(640, 471)->save(public_path('upload/about/') . $imgName);
            $data['objective_image'] = $imgName;
        }
        if ($img = $request->file('core_value_image')) {
            $imgName = date('YmdHi') . $img->getClientOriginalName();
            $img->move('upload/about/', $imgName);
            $image = Image::make(public_path('upload/about/') . $imgName);
            $image->resize(640, 471)->save(public_path('upload/about/') . $imgName);
            $data['core_value_image'] = $imgName;
        }
        $about = About::first();
        $about->update($data);

        return redirect()->route('about.overview')->with('success','Data Update successfully');
    }

    public function aboutEdit($id)
    {

        $data['editData'] = About::find($id);
        return view('backend.homepage.about.about_add',$data);
    }

    public function aboutUpdate(Request $request,$id)
    {
            
        $data = $request->all();

        $request->validate([
            'banner_image' => 'mimes:jpg,jpeg,png',
            'core_value_image' => 'mimes:jpg,jpeg,png',
            'objective_image' => 'mimes:jpg,jpeg,png',
            'about_image_1' => 'mimes:jpg,jpeg,png',
            'about_image_2' => 'mimes:jpg,jpeg,png',
        ]);

        if ($img = $request->file('about_image_1')) {
            @unlink(public_path('upload/about/'.$data->about_image_1));
            $imgName = date('YmdHi').'.'.$img->getClientOriginalEXtension();
            $img->move('upload/about/', $imgName);
            $image=Image::make(public_path('upload/about/').$imgName);
            $image->resize(640,471)->save(public_path('upload/about/').$imgName);
            $data['about_image_1'] = $imgName;
        }
        if ($img = $request->file('about_image_2')) {
            @unlink(public_path('upload/about/'.$data->about_image_2));
            $imgName = date('YmdHi').$img->getClientOriginalName();
            $img->move('upload/about/', $imgName);
            $image=Image::make(public_path('upload/about/').$imgName);
            $image->resize(640,471)->save(public_path('upload/about/').$imgName);
            $data['about_image_2'] = $imgName;
        }
        if ($img = $request->file('banner_image')) {
            @unlink(public_path('upload/about/' . $data->banner_image));
            $imgName = date('YmdHi') . $img->getClientOriginalName();
            $img->move('upload/about/', $imgName);
            $image = Image::make(public_path('upload/about/') . $imgName);
            $image->resize(1920, 300)->save(public_path('upload/about/') . $imgName);
            $data['banner_image'] = $imgName;
        }
        if ($img = $request->file('core_value_image')) {
            @unlink(public_path('upload/about/' . $data->core_value_image));
            $imgName = date('YmdHi') . $img->getClientOriginalName();
            $img->move('upload/about/', $imgName);
            $image = Image::make(public_path('upload/about/') . $imgName);
            $image->resize(640, 471)->save(public_path('upload/about/') . $imgName);
            $data['core_value_image'] = $imgName;
        }
        if ($img = $request->file('objective_image')) {
            @unlink(public_path('upload/about/' . $data->objective_image));
            $imgName = date('YmdHi') . $img->getClientOriginalName();
            $img->move('upload/about/', $imgName);
            $image = Image::make(public_path('upload/about/') . $imgName);
            $image->resize(640, 471)->save(public_path('upload/about/') . $imgName);
            $data['objective_image'] = $imgName;
        }
        $about = About::first();
        $about->update($data);

        return redirect()->route('about.overview')->with('success','Data Update successfully');
    }

    public function aboutDelete(Request $request)
    {
        $data = About::find($request->id);
        if (file_exists('upload/about_images/' . $data->image) AND ! empty($data->image)) {
            unlink('upload/about_images/' . $data->image);
        }
        if($data->delete()){
            $user_log = new UserLog();
            $user_log->table_name       = $data->getTable();
            $user_log->who_changed      = Auth::user()->name;
            $user_log->what_changed_en  = "<b>"."About us Deleted"."</b>";
            $user_log->what_changed_bn  = "<b>"."About us ডিলিটেড করা হয়েছে"."</b>";
            $user_log->save();
        }
        return redirect()->route('homepages.about.view')->with('success','Data Deleted successfully');
    }

    public function vcInformation()
    {
        $editData = VcInformation::first();

        return view('backend.about.vc-information',compact('editData'));
    }

    public function vcInformationUpdate(Request $request, $id)
    {
        $request->validate([
            'image' => 'mimes:jpg,jpeg,png',
        ]);

        $data = $request->all();

        $info = VcInformation::find($id);
        if($request->file('image'))
               {
                $config = array(
                    'name'      => "image",
                    'path'      => 'upload/vc',
                    'width'     => 300,
                    'height'    => 300
                );
                $images = ImageHelper::uploadImage($config);
                $data['image'] = $images['filename'];
               }

        $info->update($data);

        return redirect()->route('vc.information')->with('success','Data Update successfully');

    }
}
