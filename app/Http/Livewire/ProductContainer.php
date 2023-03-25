<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

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

   protected $rules = [


    'amount.*' => 'required|numeric|min:0',
    'notes.*' => 'required|numeric|min:0',
    'qtyone.*' => 'required|numeric|min:0',
    'qtytwo.*' => 'required|numeric|min:0',
    'qtythree.*' => 'required|numeric|min:0',  
    
    ];



    public function incluir($id)
    {   
        //dd($this->amount);

        $this->validate();        


        $sumaparcial = $this->qtyone[$id] + $this->qtytwo[$id] + $this->qtythree[$id];

        if ( $sumaparcial == $this->amount[$id] ) {

            $this->mensajex= 'agregando productos '. $id. "amount ". $this->amount[$id];
            $this->status = 'table-success';
            $this->control=$id;            

            
        }else {

            $this->status = 'table-danger';
            $this->mensajex= 'The quantity must be equal to 
            the sum of the quantity One, two and three'; 
            $this->control=$id;               
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
