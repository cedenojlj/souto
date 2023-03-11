<?php

namespace App\Http\Controllers;

use App\Mail\DemoEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    
    
    public function index()
    {
        $emailData=[

            'title'=>'Email from siproced@gmail.com',
            'body'=>'This is for testing',

        ];

        Mail::to("cedenojlj@gmail.com")->send(new DemoEmail($emailData));

        dd("all is ready");
    }
}
