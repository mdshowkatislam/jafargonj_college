<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;


use App\Models\Profile;
use App\Models\ProfileJournal;
use App\Models\ProfileConference;
use App\Models\ProfileBook;
use App\Models\ProfileBiography;
use App\Models\ProfileProfessionalActivity;
use App\Models\ProfileCourseTaught;
use App\Models\ProfileAwardHonor;
use App\Models\ProfileMembership;
use App\Models\ProfileResearchAreaInterest;
use App\Models\PersonnelsToFaculty;
use App\Models\PersonnelsToFacultyOfficer;
use App\Models\PersonnelsToOffice;
use App\Models\SocialMediaLink;

use App\Services\FacultyService;
use App\Services\DepartmentService;
use App\Services\OfficeService;

use Illuminate\Support\Facades\DB;


class FetchPersonnelData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:personnel-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch Personnel Data From API';

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
            DB::table('profile_achievements')->truncate();
            DB::table('profile_award_honors')->truncate();
            DB::table('profile_biographies')->truncate();
            DB::table('profile_books')->truncate();
            DB::table('profile_conferences')->truncate();
            DB::table('profile_course_taughts')->truncate();
            DB::table('profile_google_scholars')->truncate();
            DB::table('profile_journals')->truncate();
            DB::table('profile_memberships')->truncate();
            DB::table('profile_professional_activities')->truncate();
            DB::table('profile_research_area_interests')->truncate();
            DB::table('profile_research_gates')->truncate();
            DB::table('profile_trainings')->truncate();
            DB::table('profile_websites')->truncate();
            DB::table('social_media_links')->truncate();

            $client = new \GuzzleHttp\Client(['verify' => false]);

            $resOfficer = $client->request('GET', 'https://api.bup.edu.bd/api/GetOfficeEmployeeProfile?officeId=0&page=0&size=0');
            $apiDatasOfficer = json_decode($resOfficer->getBody()->getContents(), true);
            $resFaculty = $client->request('GET', 'https://api.bup.edu.bd/api/GetFacultyDepartmentWiseProfile?departmentId=0&facultyId=0');
            $apiDatasFaculty = json_decode($resFaculty->getBody()->getContents(), true);
            $resFacultyStaff = $client->request('GET', 'https://api.bup.edu.bd/api/GetFacultyDepartmentWiseStaffProfile?departmentId=0&facultyId=0');

            $apiDatasFacultyStaff = array_map(function ($list) {
                $list['type'] = 'staff';
                return $list;
            }, json_decode($resFacultyStaff->getBody()->getContents(), true));


            $clientdatas = array_merge($apiDatasOfficer, $apiDatasFaculty, $apiDatasFacultyStaff);

            // dd(count($clientdatas));

            // PersonnelsToFaculty::whereColumn('id', 'id')->update(['status' => '0']);
            // PersonnelsToOffice::whereColumn('id', 'id')->update(['status' => '0']);

            $all_profiles = Profile::where('insert_type', 1)->get();
            PersonnelsToFaculty::whereIn('profile_id', $all_profiles->pluck('id')->toArray())->update(['status' => '0']);
            PersonnelsToOffice::whereIn('profile_id', $all_profiles->pluck('id')->toArray())->update(['status' => '0']);

            foreach ($clientdatas as $clientdata) {
                $profileExist = Profile::where('bup_no', $clientdata['BupNo'])->first();
                if ($profileExist) {
                    $profile = $profileExist;
                } else {
                    $profile = new Profile;
                }
                if (!empty($clientdata['FacultyId'])) {

                    if (@$clientdata['type'] == 'staff') {
                        $profile->personnel_type = 3;
                    } else {
                        $profile->personnel_type = 1;
                    }
                    $faculty_id = FacultyService::ExistCheck($clientdata['FacultyId'], $clientdata['Faculty']);
                } else if (!empty($clientdata['OfficeID'])) {
                    $profile->personnel_type = 2;
                    $faculty_id = NULL;
                    $dept_id = NULL;
                    $office_id = OfficeService::ExistCheck($clientdata['OfficeID'], $clientdata['Office']);
                }
                if (!empty($clientdata['DepartmentId'])) {
                    $dept_id = DepartmentService::ExistCheck(['department_id' => $clientdata['DepartmentId'], 'department_name' => $clientdata['Department'], 'faculty_id' => $faculty_id]);
                } else {
                    $dept_id = null;
                }

                // $profile->faculty_id = $faculty_id;
                // $profile->department_id = $dept_id;
                // $profile->office_id = $clientdata['OfficeID'] ?? NULL;
                $profile->bup_no = $clientdata['BupNo'] ?? NULL;
                $profile->nameEn = $clientdata['NameEng'] ?? NULL;
                $profile->nameBn = $clientdata['NameBng'] ?? NULL;
                $profile->email = $clientdata['Email'] ?? NULL;
                $profile->designation = $clientdata['Designation'] ?? NULL;
                $profile->phone = $clientdata['Phone'] ?? NULL;
                $profile->mobile = $clientdata['Mobile'] ?? NULL;
                $profile->blood_group = $clientdata['BloodGroup'] ?? NULL;
                $profile->photo_path = $clientdata['PhotoPath'] ?? NULL;
                $profile->rank = $clientdata['Rank'] ?? NULL;
                $profile->appointment_type = $clientdata['AppointmentType'] ?? NULL;
                $profile->detail_education = $clientdata['DetailEducation'] ?? NULL;
                $profile->experience = $clientdata['Experience'] ?? NULL;
                $profile->insert_type = 1;


                // $photo_path = $clientdata['PhotoPath'] ?? NULL;
                // if ($photo_path && @file_get_contents($photo_path)) {
                //     $info = pathinfo($photo_path);
                //     $contents = @file_get_contents($photo_path);
                //     $file = public_path('upload/profiles/') . $info['basename'];
                //     file_put_contents($file, $contents);
                //     $uploaded_file = new UploadedFile($file, $info['basename']);

                //     $profile->photo = $info['basename'];
                // }



                $profile->save();

                $social_media = new SocialMediaLink();

                if (!empty($clientdata['GoogleScholar']) || !empty($clientdata['ResearchGate']) || !empty($clientdata['Website'])) {
                    // foreach($clientdata['GoogleScholar'] as $single)
                    // {
                    // $profileGoogleScholar = new ProfileGoogleScholar;
                    $social_media->profile_id = $profile->id;
                    $social_media->google_scholar_link = $clientdata['GoogleScholar'][0]['GoogleScholar'] ?? NULL;
                    $social_media->research_gate_link = $clientdata['ResearchGate'][0]['ResearchGate'] ?? NULL;
                    $social_media->website_link = $clientdata['WebsiteAddress'][0]['WebsiteAddress'] ?? NULL;
                    // return $apiDatas[7]['GoogleScholar'][0]['GoogleScholar'];

                    $social_media->save();
                    // }
                } else {
                    $social_media->profile_id = $profile->id;
                    $social_media->google_scholar_link =  NULL;
                    $social_media->research_gate_link =  NULL;
                    $social_media->website_link =  NULL;
                    // return $apiDatas[7]['GoogleScholar'][0]['GoogleScholar'];

                    $social_media->save();
                }

                if (!empty($clientdata['FacultyId'])) {


                    if (@$clientdata['type'] == 'staff') {
                        $existPersonnelToFaculty = PersonnelsToFacultyOfficer::where('department_id', @$dept_id)->where('faculty_id', @$faculty_id)->where('profile_id', $profile->id)->first();
                    } else {
                        $existPersonnelToFaculty = PersonnelsToFaculty::where('department_id', @$dept_id)->where('faculty_id', @$faculty_id)->where('profile_id', $profile->id)->first();
                    }
                    if ($existPersonnelToFaculty) {
                        $personnelToFaculty = $existPersonnelToFaculty;
                    } else {
                        if (@$clientdata['type'] == 'staff') {
                            $personnelToFaculty = new PersonnelsToFacultyOfficer();
                        } else {
                            $personnelToFaculty = new PersonnelsToFaculty();
                        }
                    }

                    // $personnelToFaculty = new PersonnelsToFaculty();
                    $personnelToFaculty->faculty_id = $faculty_id;
                    $personnelToFaculty->department_id = $dept_id;
                    $personnelToFaculty->profile_id = $profile->id;
                    $personnelToFaculty->status = 1;
                    $personnelToFaculty->save();
                } else if (!empty($clientdata['OfficeID'])) {
                    $existPersonnelToOffice = PersonnelsToOffice::where('office_id', @$office_id)->where('profile_id', $profile->id)->first();

                    if ($existPersonnelToOffice) {
                        $personnelToOffice = $existPersonnelToOffice;
                    } else {
                        $personnelToOffice = new PersonnelsToOffice();
                    }
                    $personnelToOffice->office_id = $office_id;
                    $personnelToOffice->profile_id = $profile->id;
                    $personnelToOffice->status = 1;
                    $personnelToOffice->save();
                }

                if (!empty($clientdata['Journal'])) {
                    foreach ($clientdata['Journal'] as $single) {
                        $profileJournal = new ProfileJournal;
                        $profileJournal->profile_id = $profile->id;
                        $profileJournal->JournalDetail = $single['JournalDetail'] ?? NULL;
                        $profileJournal->save();
                    }
                }

                if (!empty($clientdata['Conference'])) {
                    foreach ($clientdata['Conference'] as $single) {
                        $profileConference = new ProfileConference;
                        $profileConference->profile_id = $profile->id;
                        $profileConference->ConferenceDetail = $single['ConferenceDetail'] ?? NULL;
                        $profileConference->save();
                    }
                }

                if (!empty($clientdata['Book'])) {
                    foreach ($clientdata['Book'] as $single) {
                        $profileBook = new ProfileBook;
                        $profileBook->profile_id = $profile->id;
                        $profileBook->BookDetail = $single['BookDetail'] ?? NULL;
                        $profileBook->save();
                    }
                }

                if (!empty($clientdata['Biography'])) {
                    foreach ($clientdata['Biography'] as $single) {
                        $profileBiography = new ProfileBiography;
                        $profileBiography->profile_id = $profile->id;
                        $profileBiography->Biography = $single['Biography'] ?? NULL;
                        $profileBiography->save();
                    }
                }

                if (!empty($clientdata['ProfessionalActivity'])) {
                    foreach ($clientdata['ProfessionalActivity'] as $single) {
                        $profileProfessionalActivity = new ProfileProfessionalActivity;
                        $profileProfessionalActivity->profile_id = $profile->id;
                        $profileProfessionalActivity->ProfessionalActivity = $single['ProfessionalActivity'] ?? NULL;
                        $profileProfessionalActivity->save();
                    }
                }

                if (!empty($clientdata['CourseTaught'])) {
                    foreach ($clientdata['CourseTaught'] as $single) {
                        $profileCourseTaught = new ProfileCourseTaught;
                        $profileCourseTaught->profile_id = $profile->id;
                        $profileCourseTaught->CourseTaught = $single['CourseTaught'] ?? NULL;
                        $profileCourseTaught->save();
                    }
                }

                if (!empty($clientdata['AwardHonor'])) {
                    foreach ($clientdata['AwardHonor'] as $single) {
                        $profileAwardHonor = new ProfileAwardHonor;
                        $profileAwardHonor->profile_id = $profile->id;
                        $profileAwardHonor->AwardHonor = $single['AwardHonor'] ?? NULL;
                        $profileAwardHonor->save();
                    }
                }

                if (!empty($clientdata['Membership'])) {
                    foreach ($clientdata['Membership'] as $single) {
                        $profileMembership = new ProfileMembership;
                        $profileMembership->profile_id = $profile->id;
                        $profileMembership->Membership = $single['Membership'] ?? NULL;
                        $profileMembership->save();
                    }
                }

                if (!empty($clientdata['ResearchAreaInterest'])) {
                    foreach ($clientdata['ResearchAreaInterest'] as $single) {
                        $profileResearchAreaInterest = new ProfileResearchAreaInterest;
                        $profileResearchAreaInterest->profile_id = $profile->id;
                        $profileResearchAreaInterest->ResearchAreasOrInterest = $single['ResearchAreasOrInterest'] ?? NULL;
                        $profileResearchAreaInterest->save();
                    }
                }
            }



            logData($primary_id = null, $url = null, $old_data = null, $new_data = null, $action = 'Personnel Data is Successfully Executed By Cron Job!', $created_by =  null, $updated_by = null);

            return 0;
        } catch (\Exception $e) {

            // Log the error
            logData($primary_id = null, $url = null, $old_data = null, $new_data = null, $action = 'An error occurred during fetching personnel data.' . $e->getMessage(), $created_by =  null, $updated_by = null);

            // Return a non-zero value to indicate failure
            return 1;
        }
    }
}
