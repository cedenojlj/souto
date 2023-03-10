<?php

namespace App\Http\Livewire;

use App\Models\Customer;
use Livewire\Component;

class CheckOut extends Component
{

    public $search='';

    public $Customers;

    public $idCustomer;

    public $Customer;

    public $email;

    public $pin;

    public $rebate;

    public $rebateEmail;


    protected $rules = [

        'idCustomer' => 'required',
        'email' => 'required|email',
        'pin' => 'required',
        'rebateEmail' => 'required_with:rebate'
    ];


    public function CaptarIdCliente()
    {
        $this->Customers= Customer::where('name','LIKE','%'.$this->search.'%')->get();
       
    }


    public function submit()
    {
        $this->validate();
 
        // Execution doesn't reach here if validation fails.
 
        dd('dentro del submit');
    }


    public function render()
    {
        return view('livewire.check-out');
    }
}
