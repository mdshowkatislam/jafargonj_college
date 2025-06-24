<?php

namespace App\Services\CompleteResearchService;

use App\Models\CompletedResearch;
use App\Services\IService;

class CompleteResearchService
{

    public function CompleteResearch($id)
    {
        try {
            $data = CompletedResearch::with('profile')->find($id);
            return $data;
        } catch (\Exception $e) {
            return response()->json(["msg" => $e->getMessage()]);
        }
    }
    public function typeWiseCompleteResearch($type, $take)
    {
        try {
            $data = CompletedResearch::where('research_for', $type)->take($take)->get();
            return $data;
        } catch (\Exception $e) {
            return response()->json(["msg" => $e->getMessage()]);
        }
    }
}
