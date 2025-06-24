<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Faculty;
use App\Models\Hall;
use App\Models\Office;
use App\Models\UserRole;
use App\Services\Message\MessageService;
use App\Services\Profile\ProfileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    private $profileService;
    private $messageService;

    public function __construct(ProfileService $profileService, MessageService $messageService)
    {
        $this->profileService = $profileService;
        $this->messageService = $messageService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $data['role'] = UserRole::where('user_id', $user->id)->first();
        // dd($data['role']->role_id);
        if (!$data['role']) {
            $data['messages'] = $this->messageService->getAll();
        } elseif($data['role']->role_id == '1') {
            $data['messages'] = $this->messageService->getAll();
        } else {
            $data['messages'] = $this->messageService->getByProfileID($user->profile_id);
        }

        return view('backend.message.message-view')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        $user = Auth::user();
        $data['role'] = UserRole::where('user_id', $user->id)->first();
        // $data['profiles'] = $this->profileService->getAll();
        return view('backend.message.message-add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'category_id' => 'required',
            'status' => 'required',

            'title_first_part' => 'required',

        ]);
        $this->messageService->create($request);

        return redirect()->route('message')->with('success', 'Message Saved Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['user'] = Auth::user();
        $data['role'] = UserRole::where('user_id', $data['user']->id)->first();

        $data['editData'] = $this->messageService->getByID($id);
        // dd($data['editData']);
        return view('backend.message.message-add', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'category_id' => 'required',
            'status' => 'required',

            'title_first_part' => 'required',

        ]);

        $this->messageService->update($request, $id);


        return redirect()->route('message')->with('info', 'Message Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->messageService->delete($request->id);
        return redirect()->back();
    }

    public function typeWiseCategory(Request $request)
    {
        if ($request->type_id == 1) {
            $data['categories'] = Faculty::where('status', 1)->get();
        } elseif ($request->type_id == 2) {
            $data['categories'] = Department::where('status', 1)->get();
        } elseif ($request->type_id == 3) {
            $data['categories'] = Office::where('status', 1)->get();
        } elseif ($request->type_id == 4) {
            $data['categories'] = Hall::where('status', 1)->get();
        }
        // dd( $data['categories']);
        if (isset($data['categories'])) {
            return response()->json($data['categories']);
        } else {
            return response()->json('fail');
        }
    }
    public function categoryWiseHead(Request $request)
    {
        $data = $this->profileService->headList($request->type_id, $request->category_id);

        if (isset($data)) {
            return $data;
        } else {
            return response()->json('fail');
        }
    }
}
