<?php

namespace App\Exports;

use App\Models\Customer;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


/* use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Style;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithBackgroundColor; */



class OrderExport implements FromView, ShouldAutoSize
{
    public $id;

    public function __construct($id)
    {
        $this->id= $id;
    }


    
    
    public function view(): View
    {
        $orden= Order::find($this->id);

        $orderDate="#".$orden->created_at->format('Ymdhis');

        

       
        
        
        $customer= Customer::find($orden->customer_id);

        return view('exports.order', [

            'orders' => Order::find($this->id)->ordersdetails,
            'orden'=>$orden,
            'customer'=>$customer,
            'orderDate'=> $orderDate

        ]);
    }
}


