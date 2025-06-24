<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\LogoService;

class LogoController extends Controller
{
    private $logoService;

    public function __construct(LogoService $logoService)
    {
        $this->logoService = $logoService;
    }

    public function index()
    {
        $data['logos'] = $this->logoService->getAll();
        return view('backend.logo.view', $data);
    }
    public function add()
    {
        return view('backend.logo.add');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required',
            'image'  => 'required|mimes:jpg,jpeg,png,svg',
            'status' => 'required',
        ]);
        $this->logoService->create($request);
        return redirect()->route('site-setting.logo')->with('success', 'Data successfully inserted!');
    }
    public function edit($id)
    {
        $data['editData'] = $this->logoService->getByID($id);
        return view('backend.logo.add', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'                  => 'required',
            'image'                 => 'mimes:jpg,jpeg,png,svg',
            'status'                => 'required',
        ]);

        $this->logoService->update($request, $id);

        return redirect()->route('site-setting.logo')->with('info', 'Data successfully updated!');
    }
    public function delete(Request $request)
    {
        $id = $request->id;
        $this->logoService->delete($id);
        return redirect()->back();
    }
}
