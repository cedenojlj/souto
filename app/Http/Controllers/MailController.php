<?php

namespace App\Http\Controllers;

use App\Mail\DemoEmail;
use App\Exports\OrderExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class MailController extends Controller
{
    
    
    public function index($id)
    {
        $emailData=[

            'title'=>'Email from siproced@gmail.com',
            'body'=>'This is for testing',

        ];

        $reporte = Excel::raw(new OrderExport($id), \Maatwebsite\Excel\Excel::XLSX);

        Mail::to("cedenojlj@gmail.com")->send(new DemoEmail($emailData, $reporte));

        dd("all is ready");
    }
}


