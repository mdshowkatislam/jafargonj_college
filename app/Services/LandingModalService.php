<?php

namespace App\Services;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\LandingModal;
use Illuminate\Http\Request;

/**
 * Class LandingModalService
 * @package App\Services
 */
class LandingModalService
{
    // This function shows list of LandingModal

    public static function LandingModalList()
    {
        try {
            $data = LandingModal::leftJoin('faculties', 'landing_modals.faculty_id', 'faculties.ucam_faculty_id')
                ->leftJoin('departments', 'landing_modals.department_id', 'departments.ucam_department_id')
                ->select(
                    'landing_modals.id',
                    'landing_modals.status',
                    'landing_modals.name',
                    'landing_modals.image',
                    'landing_modals.description',
                    'landing_modals.use_for',
                    'departments.name as dname',
                    'faculties.name  as fname'
                )
                ->orderBy('id', 'DESC')->get();

            return $data;
        } catch (\Exception $e) {
            $d['error'] = 'Something wrong';
            return response()->json(["msg" => $e->getMessage()]);
        }
    }

    public static function getModalByType($type)
    {
        try {
            $today = date('Y-m-d'); // Assign today's date

            $query = LandingModal::where('use_for', $type)
                ->whereDate('start_date', '<=', $today)
                ->whereDate('end_date', '>=', $today)
                ->where('status', 1);

            // if ($faculty_id) {
            //     $query->where('faculty_id', $faculty_id);
            // }

            // if ($department_id) {
            //     $query->where('department_id', $department_id);
            // }

            $data = $query->first();
            return $data;
        } catch (\Exception $e) {
            return response()->json(["msg" => $e->getMessage()]);
        }
    }
    public static function getModalByTypeId($type, $type_id)
    {
        try {
            $today = date('Y-m-d'); // Assign today's date

            $query = LandingModal::where('use_for', $type)
                ->whereDate('start_date', '<=', $today)
                ->whereDate('end_date', '>=', $today)
                ->where('status', 1)
                ->where('use_for_id', $type_id);

            // if ($faculty_id) {
            //     $query->where('faculty_id', $faculty_id);
            // }

            // if ($department_id) {
            //     $query->where('department_id', $department_id);
            // }

            $data = $query->first();
            return $data;
        } catch (\Exception $e) {
            return response()->json(["msg" => $e->getMessage()]);
        }
    }

    public function saveEvent(Request $request)
    {
        $params = $request->all();
        if ($image = $request->file('image')) {
            $imageName = date('Ymd') . '_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/modal'), $imageName);
            $params['image'] = $imageName;
        }
        if ($request->use_for == 2) {
            $params['use_for_id'] = $request->faculty_id;
        } elseif($request->use_for == 3) {
            $params['use_for_id'] = $request->department_id;
        } elseif($request->use_for == 4) {
            $params['use_for_id'] = $request->office_id;
        } elseif($request->use_for == 5) {
            $params['use_for_id'] = $request->club_id;
        } elseif($request->use_for == 6) {
            $params['use_for_id'] = $request->hall_id;
        }
        $data = LandingModal::Create($params);
        return $data;
    }
    public static function ModlSingleData($id)
    {
        $data = LandingModal::find($id);

        return $data;
    }

    public function updateEvent(Request $request, $id)
    {
        $data = LandingModal::find($id);
        $data->name = $request->name;
        $data->description = $request->description;
        $data->use_for = $request->use_for;
        if ($request->use_for == 2) {
            $data['use_for_id'] = $request->faculty_id;
        } elseif($request->use_for == 3) {
            $data['use_for_id'] = $request->department_id;
        } elseif($request->use_for == 4) {
            $data['use_for_id'] = $request->office_id;
        } elseif($request->use_for == 5) {
            $data['use_for_id'] = $request->club_id;
        } elseif($request->use_for == 6) {
            $data['use_for_id'] = $request->hall_id;
        }
        // $data->department_id = $request->department_id;
        // $data->faculty_id = $request->faculty_id;
        $data->status = $request->status;
        $data->start_date = $request->start_date;
        $data->end_date = $request->end_date;

        if ($image = $request->file('image')) {
            @unlink(public_path('upload/modal/' . $data->image));
            $imageName = date('Ymd') . '_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/modal'), $imageName);
            $data->image = $imageName;
        }
        try {
            $data->update();
            return true;
        } catch (Exception $e) {
            return $e;
        }
    }
    public function statusChangeEvent(Request $request)
    {
        $data = LandingModal::find($request->id);
        $data->status = $request->status;
        $data->update();
        return true;
    }
}
