<?php

namespace App\Services;

use App\Models\Alumni;
use App\Services\IService;
use Illuminate\Http\Request;

/**
 * Class alumniService
 * @package App\Services
 */
class AlumniService implements IService
{

    public function getAll()
    {
        $data = Alumni::orderBy('id','desc')->get();
        return $data;
    }

    public function getByID($id)
    {
        $data = Alumni::find($id);
        return $data;
    }
    
    public function create(Request $request)
    {
    }

    public function update(Request $request,$id)
    {
    }

    public function delete($id)
    {
    }

    public function FacultyWisealumni($faculty_id)
    {
        $data = Alumni::where('faculty_id', $faculty_id)->where('status',1)->get();
        return $data;
    }
    public function DepartmentWisealumni($department_id)
    {
        $data = Alumni::where('department_id', $department_id)->where('status',1)->get();
        return $data;
    }
}