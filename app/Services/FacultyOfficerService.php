<?php

namespace App\Services;
use App\Models\PersonnelsToFacultyOfficer;
use Illuminate\Http\Request;

/**
 * Class FacultyOfficerService
 * @package App\Services
 */
class FacultyOfficerService
{
        public static function facultyWiseStaff($id)
        {
                try {
                        $data = PersonnelsToFacultyOfficer::whereHas('profile')->where('faculty_id', $id)->where('status',1)->orderBy('sort_order', 'asc')->get();
                        return $data;
                } catch (\Exception $e) {
                        $d['error'] = 'Something wrong';
                        return response()->json(["msg" => $e->getMessage()]);
                }
        }

        public static function departmentWiseStaff($id)
        {
                try {
                        $data = PersonnelsToFacultyOfficer::whereHas('profile')->where('department_id', $id)->where('status',1)->orderBy('sort_order', 'asc')->get();
                        return $data;
                } catch (\Exception $e) {
                        $d['error'] = 'Something wrong';
                        return response()->json(["msg" => $e->getMessage()]);
                }
        }


        // add
        // public function saveEvent(Request $request)
        // {
        //         $data = DeanStaffList::Create($request->all());
        //         $data->save();
        //         return true;
        // }

        // public static function SingleData($id)
        // {
        //         $data = DeanStaffList::find($id);
        //         return $data;
        // }

        // public function updateEvent(Request $request, $id)
        // {
        //         $data = DeanStaffList::find($id);
        //         try {
        //                 $data->update($request->all());
        //                 return true;
        //         } catch (Exception $e) {
        //                 return $e;
        //         }
        // }

        // public function statusChangeEvent(Request $request)
        // {
        //         $data = DeanStaffList::find($request->id);
        //         $data->status = $request->status;
        //         $data->update();
        //         return true;
        // }
}
