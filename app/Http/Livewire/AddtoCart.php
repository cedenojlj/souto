<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddtoCart extends Component
{
    
    public $product;
    public $amount;
    public $notes=0;

    public $qtyone;
    public $qtytwo=0;
    public $qtythree=0;

    public $date1;
    public $date2;
    public $date3;

    public $finalprice;
    public $subtotal=0;
    public $total=0;

    protected $rules = [

        'amount' => 'required',
        'notes' => 'required',
        'qtyone' => 'required',
        'date1' => 'required',

    ];


    public function agregarCarrito()
    {
        $this->validate();

        $this->finalprice = $this->product->price - $this->notes;
        $this->subtotal= $this->finalprice * $this->amount;
        $this->total = $this->total + $this->subtotal;

         /* $item = [$this->product->id => [

            'amount'=>$this->amount,
            'notes'=>$this->notes,
            'qtyone'=>$this->qtyone,
            'qtytwo'=>$this->qtytwo,
            'qtythree'=>$this->qtythree,
            'date1'=>$this->date1,
            'date2'=>$this->date2,
            'date3'=>$this->date3,
            'finalprice'=>$this->finalprice,
            'subtotal'=>$this->subtotal,

        ]];  */


        /* session()->push('carrito',[$this->product->id => [

            'amount'=>$this->amount,
            'notes'=>$this->notes,
            'qtyone'=>$this->qtyone,
            'qtytwo'=>$this->qtytwo,
            'qtythree'=>$this->qtythree,
            'date1'=>$this->date1,
            'date2'=>$this->date2,
            'date3'=>$this->date3,
            'finalprice'=>$this->finalprice,
            'subtotal'=>$this->subtotal,

        ]]); */

        dd(session('carrito'));

       /*  session(['carrito'=>[1 => [

            'amount'=>20,
            'notes'=>10,
            'qtyone'=>2,
            'qtytwo'=>0,
            'qtythree'=>0,
            'date1'=>'2023-02-02',
            'date2'=>'2023-02-02',
            'date3'=>'2023-02-02',
            'finalprice'=>10,
            'subtotal'=>20,

        ], 2 => [

            'amount'=>20,
            'notes'=>10,
            'qtyone'=>2,
            'qtytwo'=>0,
            'qtythree'=>0,
            'date1'=>'2023-02-02',
            'date2'=>'2023-02-02',
            'date3'=>'2023-02-02',
            'finalprice'=>10,
            'subtotal'=>20,

        ], $this->product->id => [

            'amount'=>$this->amount,
            'notes'=>$this->notes,
            'qtyone'=>$this->qtyone,
            'qtytwo'=>$this->qtytwo,
            'qtythree'=>$this->qtythree,
            'date1'=>$this->date1,
            'date2'=>$this->date2,
            'date3'=>$this->date3,
            'finalprice'=>$this->finalprice,
            'subtotal'=>$this->subtotal,

        ]  
        
        ]]); */

        
       /* session(['carrito'=>[$this->product->id => [

            'amount'=>$this->amount,
            'notes'=>$this->notes,
            'qtyone'=>$this->qtyone,
            'qtytwo'=>$this->qtytwo,
            'qtythree'=>$this->qtythree,
            'date1'=>$this->date1,
            'date2'=>$this->date2,
            'date3'=>$this->date3,
            'finalprice'=>$this->finalprice,
            'subtotal'=>$this->subtotal,

        ]]]);  */

        dd(session('carrito'));            

        
         /* if (session()->exists('carrito')) {

            session()->push('carrito',[$this->product->id => [

                'amount'=>$this->amount,
                'notes'=>$this->notes,
                'qtyone'=>$this->qtyone,
                'qtytwo'=>$this->qtytwo,
                'qtythree'=>$this->qtythree,
                'date1'=>$this->date1,
                'date2'=>$this->date2,
                'date3'=>$this->date3,
                'finalprice'=>$this->finalprice,
                'subtotal'=>$this->subtotal,
    
            ]]);

            dd(session('carrito'));            

        } else {
            
            session()->put('carrito',[$this->product->id => [

                'amount'=>$this->amount,
                'notes'=>$this->notes,
                'qtyone'=>$this->qtyone,
                'qtytwo'=>$this->qtytwo,
                'qtythree'=>$this->qtythree,
                'date1'=>$this->date1,
                'date2'=>$this->date2,
                'date3'=>$this->date3,
                'finalprice'=>$this->finalprice,
                'subtotal'=>$this->subtotal,
    
            ]]);

            dd(session('carrito'));     
            
            //dd('carrito creado');
           
        
        }  */


        //session()->push('carrito', $item);
        

        //dd(session('carrito'));
        
        //session()->flush();

        //dd(session()->all());

        
        
       
        //dd($this->product->id);
    }
    
    public function render()
    {
        return view('livewire.addto-cart');
    }
}
