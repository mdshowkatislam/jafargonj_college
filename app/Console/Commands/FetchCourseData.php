<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Services\Course\CourseService;

class FetchCourseData extends Command
{
    private $courseService;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:course-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch Course Data From API';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(CourseService $courseService)
    {
        parent::__construct();
        $this->courseService = $courseService;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {

            DB::table('courses')->truncate();
            DB::table('course_objectives')->truncate();
            DB::table('course_outcomes')->truncate();
            DB::table('course_references')->truncate();

            $success = $this->courseService->storeApiCourseData();
            
            if ($success) {
                logData($primary_id = null, $url = null, $old_data = null, $new_data = null, $action = 'Course Data is Successfully Executed By Cron Job!', $created_by =  null, $updated_by = null);
            }

            return 0;
        } catch (\Exception $e) {


            // Log the error
            logData($primary_id = null, $url = null, $old_data = null, $new_data = null, $action = 'An error occurred during fetching course data .', $created_by =  null, $updated_by = null);

            // Return a non-zero value to indicate failure
            return 1;
        }
    }
}
