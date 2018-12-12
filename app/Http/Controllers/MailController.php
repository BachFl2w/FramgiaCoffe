<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;
use App\Mail\SendEmail;

class MailController extends Controller
{
    public function send()
    {
        Mail::send(new SendEmail());
    }
}
