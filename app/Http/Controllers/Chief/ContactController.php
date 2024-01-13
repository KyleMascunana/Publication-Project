<?php

namespace App\Http\Controllers\Chief;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('chief.mail.index');
    }

    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);

        if($this->isOnline()){
            $mail_data = [
                'recipient' => 'kyleadrian.mascunana02@gmail.com',
                'fromEmail' => $request->email,
                'fromName' => $request->name,
                'subject' => $request->subject,
                'body' => $request->message
            ];

           \Mail::send('email-template', $mail_data, function($message) use ($mail_data){
                $message->to($mail_data['recipient'])
                        ->from($mail_data['fromEmail'], $mail_data['fromName'])
                        ->subject($mail_data['subject']);
            });

            return redirect()->back()->with('success', 'Email has been sent!');
        }else{
            return redirect()->back()->withInput()->with('error', 'Check your internet connection. Try again!');
        }
    }

    public function isOnline($site = "https://youtube.com")
    {
        if(@fopen($site, "r")){
            return true;
        }else{
            return false;
        }
    }
}
