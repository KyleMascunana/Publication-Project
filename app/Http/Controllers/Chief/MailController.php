<?php

namespace App\Http\Controllers\Chief;

use App\Mail\SignUp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail()
    {
        $name = 'bob';
        Mail::to('test@gmail.com')->send(new SignUp($name));

        return view('chief.mail.index');
    }

}
