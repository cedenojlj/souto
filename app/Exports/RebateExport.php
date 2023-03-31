<?php

namespace App\Exports;

use App\Models\Order;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


use Maatwebsite\Excel\Concerns\FromCollection;

class RebateExport implements FromView, ShouldAutoSize
{
    public $id;

    public function __construct($id)
    {
        $this->id= $id;
    }
    
    public function view(): View
    {
        $orden= Order::find($this->id);
        $orderDate= $orden->created_at->format('Ymdhis');
        
        
        $customer= Customer::find($orden->customer_id);

        return view('exports.rebate', [

            'orders' => Order::find($this->id)->ordersdetails,
            'orden'=>$orden,
            'customer'=>$customer,
            'orderDate'=>$orderDate

        ]);
    }





}
