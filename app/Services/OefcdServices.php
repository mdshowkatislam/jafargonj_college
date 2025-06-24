<?php

namespace App\Services;

use App\Models\OefcdFacultyDevelopmentProgram;
use App\Models\TrainingModel; //oefcd training
use App\Models\AboutInternationalAffair;
use App\Models\CurriculumnDevelopment;
use App\Models\OefcdEvaluation;
use App\Models\Profile;
/**
 * Class OefcdServices
 * @package App\Services
 */
class OefcdServices
{
    //////
    public function getby()
    {
        $data = OefcdFacultyDevelopmentProgram::first();
        return $data;

    }
    public static function getAll()
    {
        $data = TrainingModel::all(); 
        return $data;

    }
    public function getAllByStatus()
    {
        try {
            $data = TrainingModel::where('status', 1)->latest()->get();
            return $data;
        } catch (\Exception $e) {
            $d['error'] = 'Something wrong';
            return response()->json(["msg" => $e->getMessage()]);
        }
    }
    public static function getInternationalAffairByID($id)
    { 
        $data = AboutInternationalAffair::find($id); 
        return $data;

    }
    public static function getCurriculumnByID($id)
    { 
        $data = CurriculumnDevelopment::find($id); 
        return $data;
    }
    public static function getEvaluationByID($id)
    { 
        $data = OefcdEvaluation::find($id); 
        return $data;
    }
}
