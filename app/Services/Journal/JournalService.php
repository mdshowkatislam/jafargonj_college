<?php

namespace App\Services\Journal;

use App\Models\Cpc;
use App\Models\CpcSection;
use App\Models\JournalPaper;
use App\Services\IService;

class JournalService
{
    public function JournalByType($type_id)
    {
        try {
            $data = JournalPaper::where('journal_for', $type_id)->get();
            return $data;
        } catch (\Exception $e) {
            return response()->json(["msg" => $e->getMessage()]);
        }
    }
    public function JournalList()
    {
        try {
            $data = CpcSection::where('cpc_id', 1)->where('status', 1)->orderBy('sort_order')->get();
            //$data = JournalPaper::orderBy('year', 'desc')->get();
            return $data;
        } catch (\Exception $e) {
            return response()->json(["msg" => $e->getMessage()]);
        }
    }
    public function JournalDetails($id)
    {
        try {
            $data = JournalPaper::findOrFail($id);
            return $data;
        } catch (\Exception $e) {
            return response()->json(["msg" => $e->getMessage()]);
        }
    }
    public function getByYear($year)
    {
        $data = JournalPaper::where('year', $year)->get();
        return $data;
    }
    public function getByFaculty($faculty_id)
    {
        // $data = JournalPaper::where('journal_for', 1)->where('ref_id', $faculty_id)->get();
        $data = JournalPaper::whereHas('faculty', function ($query) use ($faculty_id) {
            $query->where('id', $faculty_id);
        })->get();
        return $data;
    }
    public function getByFacultyYear($faculty_id, $year)
    {
        $data = JournalPaper::where('year', $year)->where('ref_id', $faculty_id)->get();
        return $data;
    }
    public function getByID($id)
    {
        $data = JournalPaper::findOrFail($id);
        return $data;
    }
}
