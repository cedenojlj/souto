<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Livewire\Component;
use App\Models\Customer;
use Illuminate\Support\Str;
use App\Models\Ordersdetail;
use Illuminate\Support\Facades\Auth;

class CheckOut extends Component
{

    public $searchx='';

    public $Customers=[];

    public $idCustomer;

    public $Customer;

    public $email; // email del customer

    public $email2; // segundo email del customer

    public $emailRep; // email del representante de ventas

    public $vendorEmail; // email del vendor

    public $pin;

    public $rebate;

    public $rebateEmail;

    public $errores='';

    public $comments='';

    public $status='';

    public $general='';

    public $lastId;

    public $orderDate;

    public $total=0;


    protected $rules = [

        'idCustomer' => 'required',
        'email' => 'required|email',
        'email2' => 'required|email',
        'emailRep' => 'required|email',
        'vendorEmail' => 'required|email',
        'pin' => 'required',
        
    ];


    public function updatedSearchx()
    {       
        
        $this->Customers= Customer::where('name','LIKE','%'.$this->searchx.'%')->get();
       
    }

   /*  public function CaptarIdCliente()
    {
        $this->Customers= Customer::where('name','LIKE','%'.$this->searchx.'%')->get();
       
    } */

    public function updatedidCustomer()
    {
        $this->Customer= Customer::find($this->idCustomer);

        $this->email = $this->Customer->email;

        $this->email2 = $this->Customer->email2;

        $this->emailRep = $this->Customer->emailRep;

        $this->vendorEmail = Auth::user()->emailuser;



    }


    public function submit()
    {
        $this->validate();
 
        // Execution doesn't reach here if validation fails.

        //dd('PIN: '.$this->pin. ' CustomerPIN: '.$this->Customer->pin );

        if ($this->pin != $this->Customer->pin) {
           
            $this->errores = 'The pin field is invalid.';

        }else{

            $this->errores ='';
            
            $user= User::find(Auth::id());

            

            if (session()->has('carrito')) {

                    foreach (session('carrito') as $key => $item) {

                        $total = $this->total + $item['finalprice'] * $item['amount'];                    
                    }
               
            }

            $this->total= $total;

            if (!$this->rebate) {
                
                $this->rebate=0;
            }



            $order= New Order();
            
            $order->customer_id= $this->Customer->id;
            $order->customerName= $this->Customer->name;
            $order->user_id = Auth::id();
            $order->total= $total;
            $order->date1= $user->date1;
            $order->date2= $user->date2;
            $order->date3= $user->date3;
            $order->comments= $this->comments;
            $order->customerEmail= $this->email;
            $order->customerEmail2= $this->email2;
            $order->saleRepEmail= $this->email;
            $order->vendorEmail= $this->vendorEmail;
            $order->rebate= $this->rebate;  
            $order->idRebate= Str::ulid();  

            $order->save();

            $this->lastId= $order->id;

            $this->orderDate= $order->created_at;

            //$carrito = session('carrito');

            //dd($carrito);
            
           
            if (session()->has('carrito')) {

                foreach (session('carrito') as $key => $item) {

                    if (empty($item['notes'])) {
                        
                        $item['notes']=0;
                    }  
                    
                    if (empty($item['qtytwo'])) {
                        
                        $item['qtytwo']=0;
                    }    

                    if (empty($item['notes'])) {
                        
                        $item['qtythree']=0;
                    }  

                    $producto= Product::find($item['id']);
                    
                    $ordersdetail = New Ordersdetail();           

                    $ordersdetail->order_id = $this->lastId;
                    $ordersdetail->product_id =  $item['id'];
                    $ordersdetail->name =  $item['name'];

                    $ordersdetail->upc =  $producto->upc;
                    $ordersdetail->pallet =  $producto->pallet;
                    $ordersdetail->price =  $producto->price;

                    $ordersdetail->amount =  $item['amount'];
                    $ordersdetail->notes =  $item['notes'];
                    $ordersdetail->finalprice =$item['finalprice'];
                    $ordersdetail->qtyone = $item['qtyone'];
                    $ordersdetail->qtytwo = $item['qtytwo'];
                    $ordersdetail->qtythree = $item['qtythree'];
        
                    $ordersdetail->save();


                }               
           
             }

             session()->forget('carrito');

             $this->general= 1; // para ocultar los demas campos y dejar solo el reporte
                                // de orden creada

             //$this->reset();

             $this->status = 'Order Created Successfully';
        }
        

        
    }




    public function render()
    {
        return view('livewire.check-out');
    }
}
