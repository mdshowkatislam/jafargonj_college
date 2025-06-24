<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Newsletter;
use App\Services\NewsletterService;

class NewsletterController extends Controller
{
    public function index()
    {
        $allData = NewsletterService::List();
        return view('backend.newsletter.index', compact('allData'));
    }

    public function add()
    {
        $data = [];
        return view('backend.newsletter.add', $data);
    }
    public function store(Request $request, NewsletterService $Newsletter)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'mimes:jpg,jpeg,png | max:1024',
            'attachment' => 'mimes:pdf,docx | max:10240',
        ]);
        $Newsletter->saveEvent($request);
        return redirect()->route('news.newsletter.list')->with('success', 'add Successfully');
    }
    public function edit($id)
    {
        $data['editData'] = NewsletterService::SingleData($id);
        return view('backend.newsletter.add')->with($data);
    }

    public function update(Request $request, $id, NewsletterService $Newsletter)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'mimes:jpg,jpeg,png | max:1024',
            'attachment' => 'mimes:pdf,docx | max:10240',
        ]);
        //dd($request->all());
        $Newsletter->updateEvent($request, $id);

        return redirect()->route('news.newsletter.list')->with('info', 'Update Successfully');
    }
    public function status_change(Request $request, NewsletterService $Newsletter)
    {
        $status_info = $Newsletter->statusChangeEvent($request);

        if ($status_info->status == 1) {
            return response()->json(['status' => 1, 'message' => 'Active Successfully']);
        } else {
            return response()->json(['status' => 0, 'message' => 'Inactive Successfully']);
        }
    }
}
