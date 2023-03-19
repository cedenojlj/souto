<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class CartItem extends Component
{
   
   public $product;

   public $finalprice;

   public $subtotal;

   public $notes;   

   public $price;

   public $amount;

   public $qtyone;

   public $qtytwo;

   public $qtythree;

   public $errores='';

   public $date1;

   public $date2;

   public $date3;



   protected $rules = [

    'amount' => 'required',
    'qtyone' => 'required',

];



   
    public function mount(Product $product)
    {
        $this->price = $product->price;

        $user=User::find(Auth::id());

        $this->date1= $user->date1;

        $this->date2= $user->date2;

        $this->date3= $user->date3;

    }

    public function submit()
    {
        
        $this->validate();


        if (!$this->notes) {

            $this->notes= 0;            
        }

        if (!$this->qtytwo) {

            $this->qtytwo= 0;            
        }

        if (!$this->qtythree) {

            $this->qtythree= 0;            
        }

        
        $this->finalprice = $this->price - $this->notes;


        $sumaParcial = $this->qtyone + $this->qtytwo + $this->qtythree;

        if ($this->amount == $sumaParcial) {


            $item = [

                $this->product->id => [
    
                    'id'=>$this->product->id,
                    'name'=>$this->product->name,
                    'price'=>$this->product->price,
                    'amount' => $this->amount,
                    'notes' => $this->notes,
                    'qtyone' => $this->qtyone,
                    'qtytwo' => $this->qtytwo,
                    'qtythree' => $this->qtythree,                
                    'finalprice' => $this->finalprice,
                ]
    
            ];   

            $carrito = session()->get('carrito');

            if (!$carrito) {


                session()->put('carrito', $item);

                
            } else {


                if (Arr::exists($carrito, $this->product->id)) {                

                    return redirect()->route('home')
                        ->with('errores', 'This product exists, please select another');                   
    
                } else {
    
                    $carrito[$this->product->id] = [
    
                        'id'=>$this->product->id,
                        'name'=>$this->product->name,
                        'price'=>$this->product->price,
                        'amount' => $this->amount,
                        'notes' => $this->notes,
                        'qtyone' => $this->qtyone,
                        'qtytwo' => $this->qtytwo,
                        'qtythree' => $this->qtythree,                
                        'finalprice' => $this->finalprice,
                    ];
    
                     session()->put('carrito', $carrito);
                    
                }

                
            }
            
            return redirect()->route('home')->with('status', 'Product added successfully');

        } else {
            
            $this->errores = 'The quantity must be equal to 
            the sum of the quantity One, two and three';
        }
        


       






    }


   public function updatednotes()
   {
    
        $this->finalprice = $this->price - (float) $this->notes;

        $this->subtotal = $this->amount * $this->finalprice;

   }


    public function render()
    {
        return view('livewire.cart-item');
    }
}


