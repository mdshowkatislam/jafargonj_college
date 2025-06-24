<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faculty;
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
use App\Models\ProfileGoogleScholar;
use App\Models\ProfileResearchGate;
use App\Models\ProfileWebsite;
use App\Models\PersonnelsToFaculty;
use App\Models\PersonnelsToFacultyOfficer;
use App\Models\PersonnelsToOffice;
use App\Models\SocialMediaLink;
use App\Services\FacultyService;
use App\Services\DepartmentService;
use App\Services\OfficeService;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;

class ProfileFromApiController extends Controller
{
    public function indexOld()
    {
        $client = new \GuzzleHttp\Client(['verify' => false]);
        //For Office Api
        $profile_nameENs = Profile::pluck('nameEn')->toArray();
        $resOffice = $client->request('GET', '');
        $apiDatasOffice = json_decode($resOffice->getBody()->getContents(), true);
        $clientdatas = [];
        foreach ($apiDatasOffice as $key => $apiDataOffice) {
            // if (!in_array($apiDataOffice['NameEng'], $profile_nameENs))
            $clientdatas[] = $apiDataOffice;
        }
        //End for Office Api
        $profile_bup_nos = Profile::pluck('bup_no')->toArray();
        $res = $client->request('GET', '');
        $apiDatas = json_decode($res->getBody()->getContents(), true);
        // dd(array_merge($apiDatasOffice,$apiDatas));
        foreach ($apiDatas as $key => $apiData) {
            // if (!in_array($apiData['BupNo'], $profile_bup_nos))
            $clientdatas[] = $apiData;
        }

        $resFacultyOfficer = $client->request('GET', '');
        $apiDatasFacultyOfficer = json_decode($resFacultyOfficer->getBody()->getContents(), true);

        foreach ($apiDatasFacultyOfficer as $key => $apiData) {
            $clientdatas[] = $apiData;
        }
        return view('backend.manage_profile.from_api.view', compact('clientdatas'));
    }

    public function index()
    {
        $client = new \GuzzleHttp\Client(['verify' => false]);

        //For Office Api
        $profile_bup_nos = Profile::pluck('bup_no')->toArray();
        $resOffice = $client->request('GET', '');
        $apiDatasOffice = json_decode($resOffice->getBody()->getContents(), true);
        $clientdatas = [];
        foreach ($apiDatasOffice as $key => $apiDataOffice) {
            // if (!in_array($apiDataOffice['NameEng'], $profile_nameENs))
            if (!in_array($apiDataOffice['BupNo'], $profile_bup_nos))
            $clientdatas[] = $apiDataOffice;
        }
        //End for Office Api
        // $profile_bup_nos = Profile::pluck('bup_no')->toArray();
        $res = $client->request('GET', '');
        $apiDatas = json_decode($res->getBody()->getContents(), true);
        // dd(array_merge($apiDatasOffice,$apiDatas));
        foreach ($apiDatas as $key => $apiData) {
            if (!in_array($apiData['BupNo'], $profile_bup_nos))
            $clientdatas[] = $apiData;
        }
        
        // $profile_fac_bup_nos = Profile::pluck('bup_no')->toArray();
        $resFacultyOfficer = $client->request('GET', '');
        $apiDatasFacultyOfficer = json_decode($resFacultyOfficer->getBody()->getContents(), true);
        
        foreach ($apiDatasFacultyOfficer as $key => $apiData) {
            if (!in_array($apiData['BupNo'], $profile_bup_nos))
            $clientdatas[] = $apiData;
        }

        return view('backend.manage_profile.from_api.view', compact('clientdatas'));
    }

    public function index_office()
    {
        $client = new \GuzzleHttp\Client(['verify' => false]);
        $res = $client->request('GET', '');

        $apiDatas = json_decode($res->getBody()->getContents(), true);

        $clientdatas = [];
        foreach ($apiDatas as $key => $apiData) {
            $profile = Profile::where('personnel_type', 2)
                ->where('designation', $apiData['Designation'])
                ->where('nameEn', $apiData['NameEng'])
                ->first();

            //dd($profile);
            if (is_null($profile)) {
                $clientdatas[] = $apiData;
            }
        }
        return view('backend.manage_profile.from_api.view_office', compact('clientdatas'));
    }

    public function file_get_contents_curl($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Set curl to return the data instead of printing it to the browser.
        curl_setopt($ch, CURLOPT_URL, $url);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }

    public function insertProfileToDB()
    {
        $client = new \GuzzleHttp\Client(['verify' => false]);
        $profile_bup_nos = Profile::pluck('bup_no')->toArray();
        $clientdatas = [];

        $resOfficer = $client->request('GET', '');
        $apiDatasOfficer = json_decode($resOfficer->getBody()->getContents(), true);
        // foreach ($apiDatasOfficer as $key => $apiData) {
        //     if (!in_array($apiData['BupNo'], $profile_bup_nos))
        //     $clientdatas[] = $apiData;
        // }
        $resFaculty = $client->request('GET', '');
        $apiDatasFaculty = json_decode($resFaculty->getBody()->getContents(), true);
        // foreach ($apiDatasFaculty as $key => $apiData) {
        //     if (!in_array($apiData['BupNo'], $profile_bup_nos))
        //     $clientdatas[] = $apiData;
        // }
        $resFacultyStaff = $client->request('GET', '');

        $apiDatasFacultyStaff = array_map(function ($list) {
            $list['type'] = 'staff';
            return $list;
        }, json_decode($resFacultyStaff->getBody()->getContents(), true));
        // foreach ($apiDatasFacultyStaff as $key => $apiData) {
        //     if (!in_array($apiData['BupNo'], $profile_bup_nos))
        //     $clientdatas[] = $apiData;
        // }
// dd($clientdatas);
        $arr = array_merge($apiDatasOfficer, $apiDatasFaculty, $apiDatasFacultyStaff);
        foreach ($arr as $key => $apiData) {
            if (!in_array($apiData['BupNo'], $profile_bup_nos))
            $clientdatas[] = $apiData;
        }
        // dd($clientdatas);
        // $clientdatas = array_merge($apiDatasOfficer, $apiDatasFaculty, $apiDatasFacultyStaff);

        // $all_profiles = Profile::where('insert_type', 1)->get();
        // PersonnelsToFaculty::whereIn('profile_id', $all_profiles->pluck('id')->toArray())->update(['status' => '0']);
        // PersonnelsToOffice::whereIn('profile_id', $all_profiles->pluck('id')->toArray())->update(['status' => '0']);
        if(count($clientdatas)>0){
            foreach ($clientdatas as $clientdata) {
                    $profile = new Profile;
                    
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

                $profile->save();

                $social_media = new SocialMediaLink();

                if (!empty($clientdata['GoogleScholar']) || !empty($clientdata['ResearchGate']) || !empty($clientdata['Website'])) {
                    $social_media->profile_id = $profile->id;
                    $social_media->google_scholar_link = $clientdata['GoogleScholar'][0]['GoogleScholar'] ?? NULL;
                    $social_media->research_gate_link = $clientdata['ResearchGate'][0]['ResearchGate'] ?? NULL;
                    $social_media->website_link = $clientdata['WebsiteAddress'][0]['WebsiteAddress'] ?? NULL;

                    $social_media->save();
                } else {
                    $social_media->profile_id = $profile->id;
                    $social_media->google_scholar_link =  NULL;
                    $social_media->research_gate_link =  NULL;
                    $social_media->website_link =  NULL;

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
        }
        return redirect()->route('manage_profile.from_database')->with('success', 'Data Inserted Successfully');
    }

    public function insertAllToDB()
    {
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
        // DB::table('programs')->truncate();
        // DB::table('courses')->truncate();
        // DB::table('course_objectives')->truncate();
        // DB::table('course_outcomes')->truncate();
        // DB::table('course_references')->truncate();
        // DB::table('departments')->truncate();
        // DB::table('faculties')->truncate();

        $client = new \GuzzleHttp\Client(['verify' => false]);

        $resOfficer = $client->request('GET', '');
        $apiDatasOfficer = json_decode($resOfficer->getBody()->getContents(), true);
        $resFaculty = $client->request('GET', '');
        $apiDatasFaculty = json_decode($resFaculty->getBody()->getContents(), true);
        $resFacultyStaff = $client->request('GET', '');

        $apiDatasFacultyStaff = array_map(function ($list) {
            $list['type'] = 'staff';
            return $list;
        }, json_decode($resFacultyStaff->getBody()->getContents(), true));
        // foreach($apiDatasFacultyStaff as $n => $i){
        //     echo $n+1 . " - ";
        //     echo $i['BupNo'] . " - ";
        //     echo $i['NameEng'];
        //     echo "<br>";
        // }
        // die;

        $clientdatas = array_merge($apiDatasOfficer, $apiDatasFaculty, $apiDatasFacultyStaff);


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
            $profile->office_telephone = $clientdata['OfficeTelephone'] ?? NULL;
            $profile->office_extension = $clientdata['OfficeExtension'] ?? NULL;
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
        return redirect()->route('manage_profile.from_database')->with('success', 'Data Inserted Successfully');
    }


    public function insertAllToDB_Office()
    {
        $client = new \GuzzleHttp\Client(['verify' => false]);
        $res = $client->request('GET', '');

        $apiDatas = json_decode($res->getBody()->getContents(), true);
        $clientdatas = [];
        foreach ($apiDatas as $key => $apiData) {
            $profile = Profile::where('personnel_type', 2)
                ->where('designation', $apiData['Designation'])
                ->where('nameEn', $apiData['NameEng'])
                ->first();

            //dd($apiData['Designation']);
            if (is_null($profile)) {
                $clientdatas[] = $apiData;
            }
        }
        foreach ($clientdatas as $clientdata) {
            $profile = new Profile;
            if (!empty($clientdata['FacultyId'])) {
                $profile->personnel_type = 1;
            } else if (!empty($clientdata['OfficeID'])) {
                $profile->personnel_type = 2;
            } else {
                $profile->personnel_type = 3;
            }
            // $profile->faculty_id = $clientdata['FacultyId'] ?? NULL;
            // $profile->department_id = $clientdata['DepartmentId'] ?? NULL;
            // $profile->office_id = $clientdata['OfficeID'] ?? NULL;
            $profile->bup_no = $clientdata['BupNo'] ?? NULL;
            $profile->nameEn = $clientdata['NameEng'] ?? NULL;
            $profile->nameBn = $clientdata['NameBng'] ?? NULL;
            $profile->email = $clientdata['Email'] ?? NULL;
            $profile->designation = $clientdata['Designation'] ?? NULL;
            $profile->phone = $clientdata['Phone'] ?? NULL;
            $profile->mobile = $clientdata['Mobile'] ?? NULL;
            $profile->blood_group = $clientdata['BloodGroup'] ?? NULL;
            $profile->rank = $clientdata['Rank'] ?? NULL;
            $profile->appointment_type = $clientdata['AppointmentType'] ?? NULL;
            $profile->detail_education = $clientdata['DetailEducation'] ?? NULL;
            $profile->experience = $clientdata['Experience'] ?? NULL;
            $profile->photo_path = $clientdata['PhotoPath'] ?? NULL;

            // $photo_path = $clientdata['PhotoPath'] ?? NULL;

            //     if($photo_path && @file_get_contents($photo_path))
            //     {
            //         $info = pathinfo($photo_path);
            //         $contents = @file_get_contents($photo_path);
            //         $file = public_path('upload/profiles/') . $info['basename'];
            //         file_put_contents($file, $contents);
            //         $uploaded_file = new UploadedFile($file, $info['basename']);

            //         $profile->photo = $info['basename'];
            //     }

            $profile->save();

            if (!empty($clientdata['FacultyId'])) {
                $profile->personnel_type = 1;
                $params = array();
                $params['faculty_id'] = $clientdata['FacultyId'] ?? NULL;
                $params['department_id'] = $clientdata['DepartmentId'] ?? NULL;
                $params['profile_id'] = $profile->id;
                PersonnelsToFaculty::create($params);
            } else if (!empty($clientdata['OfficeID'])) {
                $profile->personnel_type = 2;
                $params = array();
                $params['office_id'] = $clientdata['OfficeID'] ?? NULL;
                $params['profile_id'] = $profile->id;
                PersonnelsToOffice::create($params);
            } else {
                $profile->personnel_type = 3;
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

            // if(!empty($clientdata['GoogleScholar']))
            // {
            //     foreach($clientdata['GoogleScholar'] as $single)
            //     {
            //         $profileGoogleScholar = new ProfileGoogleScholar;
            //         $profileGoogleScholar->profile_id = $profile->id;
            //         $profileGoogleScholar->GoogleScholar = $single['GoogleScholar'] ?? NULL;
            //         $profileGoogleScholar->save();
            //     }
            // }

            // if(!empty($clientdata['ResearchGate']))
            // {
            //     foreach($clientdata['ResearchGate'] as $single)
            //     {
            //         $profileResearchGate = new ProfileResearchGate;
            //         $profileResearchGate->profile_id = $profile->id;
            //         $profileResearchGate->ResearchGate = $single['ResearchGate'] ?? NULL;
            //         $profileResearchGate->save();
            //     }
            // }

            // if(!empty($clientdata['Website']))
            // {
            //     foreach($clientdata['Website'] as $single)
            //     {
            //         $profileWebsite = new ProfileWebsite;
            //         $profileWebsite->profile_id = $profile->id;
            //         $profileWebsite->WebsiteAddress = $single['WebsiteAddress'] ?? NULL;
            //         $profileWebsite->save();
            //     }
            // }

        }
        return redirect()->back()->with('success', 'Data Inserted Successfully');
    }

    public function Add()
    {
        return view('backend.manage_faculty.add_faculty');
    }

    public function Store(Request $request)
    {
        // return $request->all();
        $request->validate([
            'name' => 'required|unique:faculties',
            'ucam_faculty_id' => 'required|unique:faculties'
        ]);

        $data = new Faculty();
        $data->name = $request->name;
        $data->ucam_faculty_id = $request->ucam_faculty_id;
        // $img = $request->file('image');
        // if ($img) {
        //     $imgName = date('YmdHi').$img->getClientOriginalName();
        //     $img->move('upload/slider_images/', $imgName);
        //     $data['image'] = $imgName;
        // }
        // $data->created_by = Auth::user()->id;
        // dd($data);
        $data->save();
        return redirect()->route('setup.manage_faculty')->with('success', 'Data Saved successfully');
    }

    public function viewSingleProfile($BupNo)
    {

        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', '' . $BupNo);
        // dd($res);
        $clientdatas = json_decode($res->getBody()->getContents(), true);
        //dd($clientdatas);
        return view('backend.manage_profile.from_api.view_single_profile', compact('clientdatas'));
    }
    public function viewSingleProfilewithName($NameEng)
    {
        //dd($NameEng);
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', '' . $NameEng);
        // dd($res);
        $clientdatas = json_decode($res->getBody()->getContents(), true);
        //dd($clientdatas);
        return view('backend.manage_profile.from_api.view_single_profile', compact('clientdatas'));
    }

    public function Edit($id)
    {
        $data['editData'] = Faculty::find($id);
        return view('backend.manage_faculty.add_faculty', $data);
    }

    public function Update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'ucam_faculty_id' => 'required'
        ]);
        $data = Faculty::find($id);
        $data->name = $request->name;
        $data->ucam_faculty_id = $request->ucam_faculty_id;
        // $img = $request->file('image');
        // if ($img) {
        //     @unlink(public_path('upload/slider_images/'.$data->image));
        //     $imgName = date('YmdHi').$img->getClientOriginalName();
        //     $img->move('upload/slider_images/', $imgName);
        //     $data['image'] = $imgName;
        // }
        // $data->updated_by = Auth::user()->id;
        // dd($data);
        $data->save();
        return redirect()->route('setup.manage_faculty')->with('success', 'Data Updated successfully');
    }

    public function Delete(Request $request)
    {
        $data = Faculty::find($request->id);
        // if (file_exists('upload/slider_images/' . $data->image) AND ! empty($data->image)) {
        //     unlink('upload/slider_images/' . $data->image);
        // }
        $data->delete();

        return redirect()->route('setup.manage_faculty')->with('success', 'Data Deleted successfully');
    }
}
