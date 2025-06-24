<?php

namespace App\Services\Program;

use App\Models\Department;
use App\Models\Faculty;
use App\Models\Program;
use App\Models\ProgramCategory;
use App\Services\IService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Services\DepartmentService;
use App\Services\FacultyService;
use Illuminate\Support\Facades\DB;

/**
 * Class FacultyService
 * @package App\Services
 */
class ProgramService implements IService
{
    public function getAll()
    {
    }
    /**
     * Create a new data
     * @param Request $data
     * @return mixed
     */
    public function create(Request $data)
    {
    }
    /**
     * Update a data
     * @param Request $data
     * @param $id
     * @return mixed
     */
    public function update(Request $data, $id)
    {
    }
    /**
     * Delete a data
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
    }
    /**
     * Get a data by id
     * @param $id
     * @return mixed
     */
    public function getByID($id)
    {
    }

    public function getApiProgramData()
    {
        $client = new \GuzzleHttp\Client(['verify' => false]);
        $res = $client->request('GET', config('configure.program_api'));
        $apiData = json_decode($res->getBody()->getContents(), true);
        return $apiData;
    }

    public function storeApiProgramData()
    {
        DB::beginTransaction();
        try {
            // DB::table('programs')->truncate();
            // DB::table('programs')->update(['status' => 0]);
            Program::whereColumn('id', 'id')->update(['status' => '0']);

            $client = new \GuzzleHttp\Client(['verify' => false]);
            $res = $client->request('GET', config('configure.program_api'));
            $apiData = json_decode($res->getBody()->getContents(), true);

            foreach($apiData as $key=>$apiDatum) {
                // $faculty = Faculty::where('ucam_faculty_id', $apiDatum['FacultyId'])->first();

                // $department = Department::where('ucam_department_id', $apiDatum['DeptID'])->first();
                // if (!$department) {
                //     return "Department not found for ID: {$apiDatum['DeptID']}";
                // }

                if (!empty($apiDatum['FacultyId'])) {
                    $faculty_id = FacultyService::ExistCheck($apiDatum['FacultyId'], $apiDatum['FacultyName']);
                } else {
                    $faculty_id = null;
                }
                
                if (!empty($apiDatum['PIMSDeptId'])) {
                    $dept_id = DepartmentService::ExistCheck(['department_id' => $apiDatum['PIMSDeptId'], 'department_name' => $apiDatum['DepartmentName'], 'faculty_id' => $apiDatum['FacultyId']]);
                } else {
                    $dept_id = null;
                }

                $program_category = ProgramCategory::where('program_category', $apiDatum['ProgramType'])->first();

                $program_check = Program::where('ucam_program_id', $apiDatum['ProgramID'])->first();

                if($program_check){
                    $data = $program_check;
                }
                else{
                    $data = new Program();
                }

                $data->program_category_id = $program_category->id;
                $data->faculty_id = $faculty_id;
                $data->department_id = $dept_id;
                $data->program_title = $apiDatum['DetailName'];
                $data->short_title = $apiDatum['ShortName'];
                $data->ucam_program_id = $apiDatum['ProgramID'];
                $data->duration = $apiDatum['Duration'];
                $data->total_credit = $apiDatum['TotalCredit'];
                $data->status = 1;
    
                $data->save();
            }
    
            $client_program = new \GuzzleHttp\Client(['verify' => false]);
            $res_program = $client_program->request('GET', config('configure.course_api'));
            $apiData_program = json_decode($res_program->getBody()->getContents(), true);
    
            foreach ($apiData_program as $key => $apiDatum) {
                $data = Program::where('ucam_program_id', $apiDatum['ProgramID'])->first();

                $data->objective = $apiDatum['Objective'];
                $data->mission = $apiDatum['Mission'];
                $data->vision = $apiDatum['Vision'];
                $data->save();
            }
            DB::commit();

            Session::flash('success', 'Data Inserted Successfully');
        } catch (\Exception $e) {
            DB::rollback();
            $errorMessage = $e->getMessage();
            Session::flash('error', $errorMessage);
        }

    }
    
    public function facultyWiseProgram($faculty_id)
    {
        $data = Program::where('faculty_id', $faculty_id)->whereIn('program_category_id', [1,2])->where('status', 1)->get();
        return $data;
    }
    public function departmentWiseProgram($department_id)
    {
        $data = Program::where('department_id', $department_id)->whereIn('program_category_id', [1,2])->where('status', 1)->get();
        return $data;
    }
    public static function programCategory()
    {
        try{
            $data=ProgramCategory::take(2)
            ->get();
            return $data;

        }catch(\Exception $e){
            $d['error'] = 'Something wrong';
            return response()->json(["msg"=>$e->getMessage()]);
        }
    }
}
