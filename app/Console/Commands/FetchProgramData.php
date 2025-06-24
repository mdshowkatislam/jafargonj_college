<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Department;
use App\Models\Faculty;
use App\Models\Program;
use App\Models\ProgramCategory;
use App\Services\DepartmentService;

use Illuminate\Support\Facades\DB;

class FetchProgramData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:program-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch Program Data From API';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        try {

            DB::table('programs')->truncate();

            $client = new \GuzzleHttp\Client(['verify' => false]);
            $res = $client->request('GET', config('configure.program_api'));
            $apiData = json_decode($res->getBody()->getContents(), true);

            // $clientdata = [];

            foreach ($apiData as $key => $apiDatum) {
                $faculty = Faculty::where('ucam_faculty_id', $apiDatum['FacultyId'])->first();
                // $department = Department::where('ucam_department_id', $apiDatum['DeptID'])->first();

                if (!empty($apiDatum['DeptID'])) {
                    $dept_id = DepartmentService::ExistCheck(['department_id' => $apiDatum['DeptID'], 'department_name' => $apiDatum['DepartmentName'], 'faculty_id' => $apiDatum['FacultyId']]);
                } else {
                    $dept_id = null;
                }

                $program_category = ProgramCategory::where('program_category', $apiDatum['ProgramType'])->first();

                $data = new Program();
                $data->program_category_id = $program_category->id;
                $data->faculty_id = $faculty->id;
                $data->department_id = $dept_id;
                $data->program_title = $apiDatum['DetailName'];
                $data->short_title = $apiDatum['ShortName'];
                $data->ucam_program_id = $apiDatum['ProgramID'];
                $data->duration = $apiDatum['Duration'];
                $data->total_credit = $apiDatum['TotalCredit'];

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
            logData($primary_id = null, $url = null, $old_data = null, $new_data = null, $action = 'Program Data is Successfully Executed By Cron Job!', $created_by =  null, $updated_by = null);
            return 0;
        } catch (\Exception $e) {


            // Log the error
            logData($primary_id = null, $url = null, $old_data = null, $new_data = null, $action = 'An error occurred during fetching program data.', $created_by =  null, $updated_by = null);

            // Return a non-zero value to indicate failure
            return 1;
        }
    }
}
