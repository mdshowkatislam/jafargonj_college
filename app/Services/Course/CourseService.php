<?php

namespace App\Services\Course;

use App\Models\Course;
use App\Models\CourseObjective;
use App\Models\CourseOutcome;
use App\Models\CourseReference;
use App\Models\Department;
use App\Models\Faculty;
use App\Models\Program;
use App\Models\ProgramCategory;
use App\Services\IService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class CourseService
 * @package App\Services
 */
class CourseService implements IService
{
    public function getAll()
    {
        try {
            $data = Course::all();
            return $data;
        } catch (\Exception $e) {
            $d['error'] = 'Something wrong';
            return response()->json(["msg" => $e->getMessage()]);
        }
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

    public function getApiCourseData()
    {
        $client = new \GuzzleHttp\Client(['verify' => false]);
        $res = $client->request('GET', config('configure.course_api'));
        $apiData = json_decode($res->getBody()->getContents(), true);
        //dd($apiData);
        return $apiData;
    }

    public function storeApiCourseData()
    {
        DB::table('courses')->truncate();
        $client = new \GuzzleHttp\Client(['verify' => false]);
        $res = $client->request('GET', config('configure.course_api'));
        $apiData = json_decode($res->getBody()->getContents(), true);

        foreach ($apiData as $key => $apiDatum) {
            $data = Program::where('ucam_program_id', $apiDatum['ProgramID'])->first();

            foreach ($apiDatum['CourseList'] as $key => $course) {
                $course_data = new Course();
                $course_data->program_id = $data->id;
                $course_data->formal_code = $course['FormalCode'];
                $course_data->title = $course['Title'];
                $course_data->credit = $course['Credits'];
                $course_data->semester_no = $course['SemesterNo'];
                $course_data->short_description = $course['ShortDescription'];
                $course_data->save();

                foreach ($course['Objective'] as $course_objective) {
                    $course_objective_data = new CourseObjective();
                    $course_objective_data->course_id = $course_data->id;
                    $course_objective_data->title = $course_objective['Title'];
                    $course_objective_data->version_id = $course_objective['VersionId'];
                    $course_objective_data->save();
                }
                foreach ($course['Outcome'] as $course_outcome) {
                    $course_outcome_data = new CourseOutcome();
                    $course_outcome_data->course_id = $course_data->id;
                    $course_outcome_data->title = $course_outcome['Title'];
                    $course_outcome_data->version_id = $course_outcome['VersionId'];
                    $course_outcome_data->save();
                }
                foreach ($course['Reference'] as $course_reference) {
                    $course_reference_data = new CourseReference();
                    $course_reference_data->course_id = $course_data->id;
                    $course_reference_data->title = $course_reference['Title'];
                    $course_reference_data->version_id = $course_reference['VersionId'];
                    $course_reference_data->details = $course_reference['Details'];
                    $course_reference_data->url = $course_reference['URL'];
                    $course_reference_data->save();
                }
            }
        }
        // dd('jj');
        return true;
    }

    public function programWiseCourse($program_id)
    {
        $data = Course::where('program_id', $program_id)->orderBy('semester_no', 'asc')->get();
        return $data;
    }
}
