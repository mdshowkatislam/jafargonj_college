<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\FinancialAid;
use App\Services\FinancialAidService;

class FinancialAidController extends Controller
{

    public function edit()
    {
        $id = 1;
        $singleData = FinancialAidService::SingleData($id);
        return view('backend.financial_aid.edit', compact('singleData'));
    }

    public function update(Request $request, $id, FinancialAidService $FinancialAid)
    {
        $request->validate([
            'how_aid_works' => 'required',
            'type_of_aids' => 'required',
            'policies_and_procedures' => 'required',
            'aid_file' => 'nullable|mimes:pdf,doc,zip',
        ]);
        $FinancialAid->updateEvent($request, $id);
        return redirect()->route('financial-aid.edit')->with('success', 'Updated Successfully');
    }
}
