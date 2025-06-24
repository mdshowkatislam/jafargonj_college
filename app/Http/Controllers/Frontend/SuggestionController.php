<?php

namespace App\Http\Controllers\Frontend;

use App\Models\suggestion;
use Illuminate\Http\Request;
use App\Services\BannerService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use SebastianBergmann\ObjectEnumerator\Exception;

class SuggestionController extends Controller
{
    private $bannerService;

    public function __construct(BannerService $bannerService) 
    {
        $this->bannerService = $bannerService;
    }
    public function suggestion()
    {
        $data['banner'] = $this->bannerService->bannerByRefId(1);
        return view('frontend.suggestion.view', $data);
    }
    public function suggestionStore(Request $request)
    {
        
        $request->validate([
            'email' => 'required|email',
            'subject' => 'required',
            'description' => 'required',
            'captcha' => 'required|captcha'
        ],[
            'captcha.required' => 'Captcha required',
            'captcha.captcha' => 'Captcha is not correct'

        ]);

        try {
            $data = new suggestion();
            $data['name'] = htmlspecialchars($request->name);
            $data['email'] = htmlspecialchars($request->email);
            $data['phone'] = htmlspecialchars($request->phone);
            $data['subject'] = htmlspecialchars($request->subject);
            $data['description'] = htmlspecialchars($request->description);
            $data->save();
            $data['user_email'] = 'web.suggestion@bup.edu.bd';
            $data = $data->toArray();

            Mail::send('frontend.suggestion.mail-page', $data, function ($message) use ($data) {
                $message->to($data['user_email']);
                $message->subject($data['subject']);
            });
            Mail::send('frontend.suggestion.feedback-page', $data, function ($message) use ($data) {
                $message->to($data['email']);
                $message->subject($data['subject']);
            });

            return redirect()->route('suggestion')->with('message', 'Thanks for your feedback!');
        } catch (Exception $e) {
            return $e;
        }
    }

    public function reloadCaptcha()
    {
       // dd(captcha_img('math'));
        //return response()->json(['captcha'=> captcha_img('math')]);
        return captcha_img('flat');
    }

}
