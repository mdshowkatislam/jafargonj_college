<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\HonorBoardMemberService;

class VcHonorBoardController extends Controller
{
    private $honorBoardMemberService;
    public function __construct(HonorBoardMemberService $honorBoardMemberService)
    {
        $this->honorBoardMemberService     = $honorBoardMemberService;
    }
    public function list()
    {
        $vc_honor_board_list               = $this->honorBoardMemberService->getHonorBoardMembers();
        return view('backend.vc_honor_board.list', compact('vc_honor_board_list'));
    }

    public function create()
    {
        return view('backend.vc_honor_board.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'                          => 'required',
            'type_id'                       => 'required',
            'designation'                   => 'required',
            'start_date'                   => 'required|date',
            'end_date'   => [
                'nullable',
                'date',
                function ($attribute, $value, $fail) {
                    $startDate = request('start_date');
                    if ($startDate && $value < $startDate) {
                        $fail('The end date must be a date after the start date.');
                    }
                },
            ],
            'image'                         => 'required|mimes:png,jpg,jpeg',
            'status'                        => 'required',
        ], [], [
            'type_id'                       => 'Honor Board Member type'
        ]);

        $this->honorBoardMemberService->store($request);
        return redirect()->route('vc.honor.board.list');
    }

    public function edit($id)
    {
        $editData                           = $this->honorBoardMemberService->getHonorBoardMember($id);
        return view('backend.vc_honor_board.add', compact('editData'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'                          => 'required',
            'type_id'                       => 'required',
            'designation'                   => 'required',
            'start_date'                   => 'required|date',
            'end_date'   => [
                'nullable',
                'date',
                function ($attribute, $value, $fail) {
                    $startDate = request('start_date');
                    if ($startDate && $value < $startDate) {
                        $fail('The end date must be a date after the start date.');
                    }
                },
            ],
            'image'                         => 'nullable|mimes:png,jpg,jpeg',
            'status'                        => 'required',
        ], [], [
            'type_id'                       => 'Honor Board Member type'
        ]);
        $request->merge([
            'id'                            => $id,
        ]);
        $this->honorBoardMemberService->update($request);

        return redirect()->route('vc.honor.board.list');
    }
}
