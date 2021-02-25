<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;


class PageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('.frontend.home');
    }



    public function send_mail()
    {
        return view('.admin.mail.mail_send');
    }

    public function send_mail_post(Request $request)
    {

        $details = [
            'title' => 'Mail title',
            'name' => $request['name'],
            'subject' => 'konu',
            'body' => 'mail body, test mail .....'
        ];

        $data = $request->only(['name', 'email']);
        Mail::to('emreozyildir@gmail.com')
            ->send(new SendMail($details));


        $response = ['status' => true, 'message' => 'Mail başarıyla gönderildi.'];
        return back()->with($response);
    }


}
