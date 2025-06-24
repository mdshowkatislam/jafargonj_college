<?php

namespace App\Services;

use App\Models\Club;
use App\Services\IService;
use Illuminate\Http\Request;

/**
 * Class ClubService
 * @package App\Services
 */
class ClubService implements IService
{

    public function getAll()
    {
        $data = Club::orderBy('id','desc')->get();
        return $data;
    }

    public function getByID($id)
    {
        $data = Club::find($id);
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

    public function FacultyWiseClub($faculty_id)
    {
        $data = Club::where('faculty_id', $faculty_id)->where('status',1)->get();
        return $data;
    }
    public function DepartmentWiseClub($department_id)
    {
        $data = Club::where('department_id', $department_id)->where('status',1)->get();
        return $data;
    }
}