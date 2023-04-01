<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Mail\DemoEmail;
use App\Mail\RebateMail;
use App\Models\Customer;
use App\Exports\OrderExport;
use Illuminate\Http\Request;
use App\Exports\RebateExport;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class MailController extends Controller
{
    
    
    public function index($id)
    {
       
        $orden= Order::find($id);

        $numberOrder="#".$orden->created_at->format('Ymdhis');

        $dateOrder="#".$orden->created_at->format('m-d-Y');

        $customer= Customer::find($orden->customer_id)->name;
       
        $tittle = 'Order Created ' .$numberOrder; 
       
        $emailData=[

            'title'=> $tittle,
            'body'=>'',
            'dateOrder' => $dateOrder,
            'customer' => $customer,

        ];

        $reporte = Excel::raw(new OrderExport($id), \Maatwebsite\Excel\Excel::XLSX);

        Mail::to("cedenojlj@gmail.com")->send(new DemoEmail($emailData, $reporte));

        dd("all is ready");
    }



    public function rebate($id)
    {
       
        $orden= Order::find($id);

        $numberOrder="#".$orden->created_at->format('Ymdhis');

        $dateOrder="#".$orden->created_at->format('m-d-Y');

        $customer= Customer::find($orden->customer_id)->name;
       
        $tittle = 'Order Created ' .$numberOrder; 
       
        $emailData=[

            'title'=> $tittle,
            'body'=>'',
            'dateOrder' => $dateOrder,
            'customer' => $customer,

        ];

        $reporte = Excel::raw(new RebateExport($id), \Maatwebsite\Excel\Excel::XLSX);

        Mail::to("cedenojlj@gmail.com")->send(new RebateMail($emailData, $reporte));

        dd("REBATE all is ready");
    }



















}




