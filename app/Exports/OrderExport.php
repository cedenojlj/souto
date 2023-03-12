<?php

namespace App\Exports;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class OrderExport implements FromView
{
    public $id;

    public function __construct($id)
    {
        $this->id= $id;
    }
    
    public function view(): View
    {
        $orden= Order::find($this->id);
        
        $customer= Customer::find($orden->customer_id);

        return view('exports.order', [

            'orders' => Order::find($this->id)->ordersdetails,
            'orden'=>$orden,
            'customer'=>$customer

        ]);
    }
}


