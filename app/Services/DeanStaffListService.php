<?php

namespace App\Services;

use App\Models\DeanStaffList;
use Illuminate\Http\Request;

/**
 * Class DeanStaffListService
 * @package App\Services
 */
class DeanStaffListService
{
        public static function List($id)
        {
                try {
                        // $data = DeanStaffList::leftJoin('dean_informations', 'dean_staff_lists.faculty_id', 'dean_informations.id')
                        //         ->select('dean_staff_lists.*', 'dean_informations.name as dean_name')
                        //         ->where('faculty_id', $id)
                        //         ->get();
                        $data = DeanStaffList::whereHas('profile')->where('faculty_id', $id)->get();

                        return $data;
                } catch (\Exception $e) {
                        $d['error'] = 'Something wrong';
                        return response()->json(["msg" => $e->getMessage()]);
                }
        }
        // add
        public function saveEvent(Request $request)
        {
                $data = DeanStaffList::Create($request->all());
                $data->save();
                return true;
        }

        public static function SingleData($id)
        {
                $data = DeanStaffList::find($id);
                return $data;
        }

        public function updateEvent(Request $request, $id)
        {
                $data = DeanStaffList::find($id);
                try {
                        $data->update($request->all());
                        return true;
                } catch (Exception $e) {
                        return $e;
                }
        }

        public function statusChangeEvent(Request $request)
        {
                $data = DeanStaffList::find($request->id);
                $data->status = $request->status;
                $data->update();
                return true;
        }
}
