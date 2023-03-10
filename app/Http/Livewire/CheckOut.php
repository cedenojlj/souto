<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Order;
use Livewire\Component;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Codec\OrderedTimeCodec;

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

    public $errores='';

    public $comments='';


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

    public function updatedidCustomer()
    {
        $this->Customer= Customer::find($this->idCustomer);

        $this->email = $this->Customer->email;
    }


    public function submit()
    {
        $this->validate();
 
        // Execution doesn't reach here if validation fails.

        //dd('PIN: '.$this->pin. ' CustomerPIN: '.$this->Customer->pin );

        if ($this->pin != $this->Customer->pin) {
           
            $this->errores = 'The pin field is invalid.';

        }else{

            $user= User::find(Auth::id());

            /* foreach (session('carrito') as $key => $value) {
                # code...
            } */

            $order= New Order();
            
            $order->customer_id= $this->Customer->id;
            $order->user_id = Auth::id();
            $order->total=0;
            $order->date1= $user->date1;
            $order->date2= $user->date2;
            $order->date3= $user->date3;
            $order->comments= $this->comments;

            $order->save();

        }
        

        
    }




    public function render()
    {
        return view('livewire.check-out');
    }
}
