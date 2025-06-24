<?php

namespace App\Services;

use App\Models\Logo;
use App\Services\IService;
use Illuminate\Http\Request;

/**
 * Class LogoService
 * @package App\Services
 */
class LogoService implements IService
{

    public function getAll()
    {
        $data                       = Logo::latest()->get();
        return $data;
    }

    public function getByID($id)
    {
        $data                       = Logo::findOrFail($id);
        return $data;
    }

    public function create(Request $request)
    {
        try {
            $data                   = new Logo();
            $data->name             = $request->name;
            $data->type_id           = $request->type_id;
            $data->status           = $request->status;
            $image                  = $request->file('image');

            if($image){
                $imageName = date('Ymd') .time(). '.'. $image->getClientOriginalExtension();
                $image->move(public_path('upload/logo'), $imageName);
                $data->image        = $imageName;
            }
            $data->save();

            return true;
        } catch (Exception $e) {
            return $e;
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $data                   = Logo::findOrFail($id);
            $data->name             = $request->name;
            $data->type_id           = $request->type_id;
            $data->status           = $request->status;
            $image                  = $request->file('image');

            if ($image) {
                @unlink(public_path('upload/logo/' . $data->image));
                $imageName          = date('Ymd') .time(). '.'  . $image->getClientOriginalExtension();
                $image->move(public_path('upload/logo'), $imageName);
                $data->image        = $imageName;
            }
            $data->update();

            return true;
        } catch (Exception $e) {
            return $e;
        }
    }

    public function delete($id)
    {
        $data                       = Logo::findOrFail($id);
        @unlink(public_path('upload/logo/' . $data->image));
        $data->delete();
        return true;
    }

}
