<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Product;
use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;

class ProductContainer extends Component
{
    public $mensajex;

    // protected $listeners = ['incluir', 'excluir'];

   public $product;    

   public $finalprice;

   public $subtotal;

   public $notes;   

   public $price;

   public $amount;

   public $qtyone;

   public $qtytwo;

   public $qtythree;   

   public $date1;

   public $date2;

   public $date3;

   public $status='';

   public $control;

   public $mierror=false;

   protected $rules = [


    'amount.*' => 'required|numeric|min:0',
    'notes.*' => 'required|numeric|min:0',
    'qtyone.*' => 'required|numeric|min:0',
    'qtytwo.*' => 'required|numeric|min:0',
    'qtythree.*' => 'required|numeric|min:0',  
    
    ];

   

    public function incluir($id)
    {   
       
        $this->product = Product::find($id);
        
        $this->price = $this->product->price;

        //$this->finalprice[$id]= $this->price[$id];

        $user=User::find(Auth::id());

        $this->date1= Carbon::createFromFormat('Y-m-d', $user->date1)->format('m/d/Y');    

        $this->date2= Carbon::createFromFormat('Y-m-d', $user->date2)->format('m/d/Y'); 

        $this->date3= Carbon::createFromFormat('Y-m-d', $user->date3)->format('m/d/Y'); 


        /* $carrito = session()->get('carrito');

        if ($carrito) {

            if (Arr::exists($carrito, $this->product->id)) {

                $this->amount[$id] = $carrito[$this->product->id]['amount'];
                $this->notes[$id] = $carrito[$this->product->id]['notes'];
                $this->qtyone[$id] = $carrito[$this->product->id]['qtyone'];
                $this->qtytwo[$id] = $carrito[$this->product->id]['qtytwo'];
                $this->qtythree[$id] = $carrito[$this->product->id]['qtythree'];  
                $this->finalprice[$id] = (float) $this->price[$id] - $this->notes[$id];
                $this->subtotal[$id] = (float) $this->amount * $this->finalprice; 
            }           
            
        } */



        $this->validate();     


        if (empty($this->notes[$id])) {

            $this->notes[$id]= 0;            
        }

        if (empty($this->qtyone[$id])) {

            $this->qtyone[$id]= 0;            
        }

        if (empty($this->qtytwo[$id])) {

            $this->qtytwo[$id]= 0;            
        }

        if (empty($this->qtythree[$id])) {

            $this->qtythree[$id]= 0;            
        }

       

        $this->finalprice = (float) $this->price - (float) $this->notes[$id];

       // dd($this->finalprice[$id]);

        $sumaparcial = $this->qtyone[$id] + $this->qtytwo[$id] + $this->qtythree[$id];

        
        if ( $sumaparcial == $this->amount[$id] ) {

            // dd($this->product->price);             
            
            $item = [

                $this->product->id => [
    
                    'id'=>$this->product->id,
                    'name'=>$this->product->name,
                    'price'=>$this->product->price,
                    'amount' => $this->amount[$id],
                    'notes' => (float) $this->notes[$id],
                    'qtyone' => $this->qtyone[$id],
                    'qtytwo' => $this->qtytwo[$id],
                    'qtythree' => $this->qtythree[$id],                
                    'finalprice' => $this->finalprice,
                ]
    
            ];   

            $carrito = session()->get('carrito');

            if (!$carrito) {


                session()->put('carrito', $item);

                
            } else {               
    
                    $carrito[$this->product->id] = [
    
                        'id'=>$this->product->id,
                        'name'=>$this->product->name,
                        'price'=>$this->product->price,
                        'amount' => $this->amount[$id],
                        'notes' => $this->notes[$id],
                        'qtyone' => $this->qtyone[$id],
                        'qtytwo' => $this->qtytwo[$id],
                        'qtythree' => $this->qtythree[$id],                
                        'finalprice' => $this->finalprice,
                    ];
    
                     session()->put('carrito', $carrito); 
                
            }

            $this->mensajex= 'Product added or updated successfully';
            $this->status = 'table-success';
            $this->control=$id;
            $this->mierror=false; 

            
        }else {

            $this->status = 'table-danger';
            $this->mensajex= 'The quantity must be equal to 
            the sum of the quantity One, two and three'; 
            $this->control=$id; 
            $this->mierror=true;              
            # code...
        }


    }

    public function excluir($id)
    {
        $this->mensajex= 'eliminando productos '. $id;
        $this->status = 'table-danger';
        $this->control=$id;
    } 

    public function render()
    {
        return view('livewire.product-container',[
            'products' => Product::all()]);
    }
}
