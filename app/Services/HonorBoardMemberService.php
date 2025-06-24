<?php

namespace App\Services;

use App\Models\VcHonorBoardMember;
use App\Helpers\ImageHelper;
use Illuminate\Http\Request;

/**
 * Class HonorBoardMemberService
 * @package App\Services
 */
class HonorBoardMemberService
{
    public function getHonorBoardMembers()
    {
        $data                           = VcHonorBoardMember::latest()->get();
        return $data;
    }

    public function getHonorBoardMember($id)
    {
        $data                           = VcHonorBoardMember::find($id);
        return $data;
    }

    public function getHonorBoardMembersByType($type_id)
    {
        $data                           = VcHonorBoardMember::where('type_id',$type_id)->where('status', 1)->orderBy('start_date', 'desc')->get();
        // dd($data->toArray());
        return $data;
    }

    public function store(Request $request)
    {
        try {
            $honor_board                = new VcHonorBoardMember();
            if ($request->has('image')) {
                $config = array(
                    'name'              => 'image',
                    'path'              => 'upload/vc_honor_board',
                    'height'            => 300,
                    'width'             => 300,
                );
                $data                   = ImageHelper::uploadImage($config);
                $honor_board->image     = $data['filename'];
            }

            $honor_board->name          = $request->name;
            $honor_board->type_id       = $request->type_id;
            $honor_board->designation   = $request->designation;
            $honor_board->start_date    = $request->start_date;
            $honor_board->end_date      = $request->end_date;
            $honor_board->status        = $request->status;
            $honor_board->save();
            $request->session()->flash('success', 'Data updated Success');
        } catch (\Exception $e) {
            return response()->json(["msg" => $e->getMessage()]);
        }
    }

    public function update(Request $request)
    {
        try {
            $honor_board                = VcHonorBoardMember::find($request->id);
            if ($request->has('image')) {
                $config = array(
                    'name'              => 'image',
                    'path'              => 'upload/vc_honor_board',
                    'height'            => 300,
                    'width'             => 300,
                );
                @unlink(public_path('upload/vc_honor_board/' . $honor_board->image));
                $data                   = ImageHelper::uploadImage($config);
                $honor_board->image     = $data['filename'];
            }
            $honor_board->name          = $request->name;
            $honor_board->type_id       = $request->type_id;
            $honor_board->designation   = $request->designation;
            $honor_board->start_date    = $request->start_date;
            $honor_board->end_date      = $request->end_date;
            $honor_board->status        = $request->status;
            $honor_board->save();
            $request->session()->flash('success', 'Data updated Successfully !');
        } catch (\Exception $e) {
            return response()->json(["msg" => $e->getMessage()]);
        }
    }
}
