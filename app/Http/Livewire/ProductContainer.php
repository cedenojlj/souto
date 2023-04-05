<?php

namespace App\Http\Livewire;

use App\Models\Bundle;
use App\Models\User;
use App\Models\Product;
use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use PhpOffice\PhpSpreadsheet\Calculation\TextData\Search;

class ProductContainer extends Component
{
    public $mensajex;

    // protected $listeners = ['incluir', 'excluir'];

    public $product;

    public $idProduct;

    public $idProductBundle;

    // public $finalprice;

    public $search = '';

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

    public $status = '';

    public $control;

    public $mierror = false;

    public $mostrarCheckout = false;

    public $indicador;

    public $items;

    public $listaProductos = [];

    public $showFormItems = false;

    public $showFormItemsBundle = false;

    public $mostrarItems = true;


    protected $rules = [


        'amount.*' => 'required|numeric|min:0',
        'notes.*' => 'required|numeric|min:0',
        'qtyone.*' => 'required|numeric|min:0',
        'qtytwo.*' => 'required|numeric|min:0',
        'qtythree.*' => 'required|numeric|min:0',

    ];


    public function mount()
    {
        $productos = Product::where('user_id', Auth::user()->id)->orderBy('prioridad', 'asc')->get();

        //dd($productos);
        //$this->listaProductos = [];

        foreach ($productos as $key => $value) {

            $this->items[] = [

                'id' => $value['id'],
                'itemnumber' => $value['itemnumber'],
                'name' => $value['name'],
                'description' => $value['description'],
                'upc' => $value['upc'],
                'pallet' => $value['pallet'],
                'price' => $value['price'],
            ];
            # code...
        }

        unset($value);

        //dd($this->items);


    }

    public function saveItem()
    {
        $this->mensajex = '';

        $producto = Product::find($this->idProduct);

        //dd($producto);

        // dd($this->items);

        if (isset($producto['id'])) {

            $this->items[] = [

                'id' => $producto['id'],
                'itemnumber' => $producto['itemnumber'],
                'name' => $producto['name'],
                'description' => $producto['description'],
                'upc' => $producto['upc'],
                'pallet' => $producto['pallet'],
                'price' => $producto['price'],
            ];


            $this->mensajex = 'Product added or updated successfully';

            // dd($this->items);

            $this->showFormItems = false;

            $this->mostrarItems = true;


            # code...
        } else {


            $this->mierror = true;

            $this->mensajex = 'You must select a product';
        }
    }


    public function closeItem()
    {
        $this->showFormItems = false;
        $this->mensajex = '';
    }


    public function openFormItem()
    {
        $this->mostrarItems = false;
        $this->mensajex = '';
        $this->showFormItems = true;
        $this->showFormItemsBundle = false;
       
    }


    public function saveItemBundle()
    {
        // dd('dentro de bundle');
        $this->mensajex = '';

        //dd($bundles);

        if (isset($this->idProductBundle)) {

            //dd($this->items);

            $bundles = Bundle::where('numBundle', $this->idProductBundle)->where('user_id', Auth::id())->get();

            //dd($bundles);


            foreach ($bundles as $bundle) {               
              
                $productBundle = Product::where('itemnumber', $bundle['itemnumber'])->first();

                $this->items[] = [

                    'id' => $productBundle['id'],
                    'itemnumber' => $productBundle['itemnumber'],
                    'name' => $productBundle['name'],
                    'description' => $productBundle['description'],
                    'upc' => $productBundle['upc'],
                    'pallet' => $productBundle['pallet'],
                    'price' => $bundle['priceBundle'],
                ];
                # code...
            }

            //dd($this->items);
            unset($bundle);
            $productBundle = '';


            $this->mensajex = 'Product added or updated successfully';

            $this->showFormItemsBundle = false;

            $this->mostrarItems = true;

            # code...
        } else {


            $this->mierror = true;

            $this->mensajex = 'You must select a Bundle';
        }
    }

    public function closeItemBundle()
    {
        $this->showFormItemsBundle = false;

        $this->mensajex = '';
    }

    public function openFormItemBundle()
    {
        $this->mostrarItems = false;
        $this->mensajex = '';
        $this->showFormItemsBundle = true;
        $this->showFormItems = false;
       
    }


    public function updatedSearch()
    {
        $this->listaProductos = Product::where('name', 'LIKE', '%' . $this->search . '%')->where('user_id', Auth::id())->orWhere('itemnumber', 'LIKE', '%' . $this->search . '%')->where('user_id', Auth::id())->get();
    }

    public function save()
    {

        

        session()->forget('carrito');

        foreach ($this->items as $key => $value) {


            if (isset($this->amount[$key])) {

                if ($this->amount[$key] < 0) {

                    $this->amount[$key] = 0;
                }

                if (empty($this->notes[$key]) or $this->notes[$key] < 0) {

                    $this->notes[$key] = 0;
                }

                if (empty($this->qtyone[$key]) or $this->qtyone[$key] < 0) {

                    $this->qtyone[$key] = 0;
                }

                if (empty($this->qtytwo[$key]) or $this->qtytwo[$key] < 0) {

                    $this->qtytwo[$key] = 0;
                }

                if (empty($this->qtythree[$key]) or $this->qtythree[$key] < 0) {

                    $this->qtythree[$key] = 0;
                }

                $finalprice = (float) $value['price'] - (float) $this->notes[$key];

                $sumaparcial = $this->qtyone[$key] + $this->qtytwo[$key] + $this->qtythree[$key];


                if ($sumaparcial == $this->amount[$key] and $this->amount[$key] > 0) {



                    $this->mierror = false;
                    $this->indicador[$key] = 'table-success';

                    //******************************************* */


                    $item = [

                        $key => [

                            'id' => $value['id'],
                            'name' => $value['name'],
                            'itemnumber' => $value['itemnumber'],
                            'price' => $value['price'],
                            'amount' => $this->amount[$key],
                            'notes' => (float) $this->notes[$key],
                            'qtyone' => $this->qtyone[$key],
                            'qtytwo' => $this->qtytwo[$key],
                            'qtythree' => $this->qtythree[$key],
                            'finalprice' => $finalprice,
                        ]

                    ];

                    $carrito = session()->get('carrito');

                    if (!$carrito) {


                        session()->put('carrito', $item);
                    } else {

                        $carrito[$key] = [


                            'id' => $value['id'],
                            'name' => $value['name'],
                            'itemnumber' => $value['itemnumber'],
                            'price' => $value['price'],
                            'amount' => $this->amount[$key],
                            'notes' => $this->notes[$key],
                            'qtyone' => $this->qtyone[$key],
                            'qtytwo' => $this->qtytwo[$key],
                            'qtythree' => $this->qtythree[$key],
                            'finalprice' => $finalprice,
                        ];

                        session()->put('carrito', $carrito);
                    }


                    //*********************************************** */
                    # code...
                } else {

                    /* $this->mensajex= 'The quantity must be equal to 
                the sum of the quantity One, two and three';     */
                    $this->mierror = true;
                    $this->indicador[$key] = 'table-danger';

                    # code...
                }

                # code..
            }
        }

        //limpiar value

        unset($value);



        if ($this->mierror) {


            $this->mensajex = 'The quantity must be equal to 
                the sum of the quantity One, two and three';
        } else {


            $this->mensajex = 'Product added or updated successfully';

            return redirect()->to('/checkout');

        }








    }


    public function incluir($id)
    {

        $this->product = Product::find($id);

        $this->price = $this->product->price;

        //$this->finalprice[$id]= $this->price[$id];

        $user = User::find(Auth::id());

        $this->date1 = Carbon::createFromFormat('Y-m-d', $user->date1)->format('m/d/Y');

        $this->date2 = Carbon::createFromFormat('Y-m-d', $user->date2)->format('m/d/Y');

        $this->date3 = Carbon::createFromFormat('Y-m-d', $user->date3)->format('m/d/Y');


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

            $this->notes[$id] = 0;
        }

        if (empty($this->qtyone[$id])) {

            $this->qtyone[$id] = 0;
        }

        if (empty($this->qtytwo[$id])) {

            $this->qtytwo[$id] = 0;
        }

        if (empty($this->qtythree[$id])) {

            $this->qtythree[$id] = 0;
        }



        //$this->finalprice = (float) $this->price - (float) $this->notes[$id];

        // dd($this->finalprice[$id]);

        $sumaparcial = $this->qtyone[$id] + $this->qtytwo[$id] + $this->qtythree[$id];

        if (empty($this->amount[$id])) {

            $this->amount[$id] = 0;
        }


        if ($sumaparcial == $this->amount[$id] and $this->amount[$id] > 0) {

            // dd($this->product->price);             

            $item = [

                $this->product->id => [

                    'id' => $this->product->id,
                    'name' => $this->product->name,
                    'price' => $this->product->price,
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

                    'id' => $this->product->id,
                    'name' => $this->product->name,
                    'price' => $this->product->price,
                    'amount' => $this->amount[$id],
                    'notes' => $this->notes[$id],
                    'qtyone' => $this->qtyone[$id],
                    'qtytwo' => $this->qtytwo[$id],
                    'qtythree' => $this->qtythree[$id],
                    'finalprice' => $this->finalprice,
                ];

                session()->put('carrito', $carrito);
            }

            $this->mensajex = 'Product added or updated successfully';
            $this->status = 'table-success';
            $this->control = $id;
            $this->mierror = false;

            $this->mostrarCheckout = true;
            $this->indicador[$id] = 'table-success';
        } else {

            $this->status = 'table-danger';
            $this->mensajex = 'The quantity must be equal to 
            the sum of the quantity One, two and three';
            $this->control = $id;
            $this->mierror = true;
            $this->indicador[$id] = 'table-danger';
            # code...
        }
    }

    public function excluir($id)
    {

        $carrito = session('carrito');

        if (Arr::exists($carrito, $id)) {

            unset($carrito[$id]);

            session()->put('carrito', $carrito);

            $this->mensajex = 'Product deleted successfully';
            $this->status = 'table-danger';
            $this->control = $id;
            $this->mierror = true;
            $this->indicador[$id] = 'table-danger';
        }

        if (session('carrito')) {

            $this->mostrarCheckout = true;
        } else {

            $this->mostrarCheckout = false;
        }
    }

    public function render()
    {
        $user = User::find(Auth::id());

        return view('livewire.product-container', [

            'fecha1' => Carbon::createFromFormat('Y-m-d', $user->date1)->format('m/d/Y'),
            'fecha2' => Carbon::createFromFormat('Y-m-d', $user->date2)->format('m/d/Y'),
            'fecha3' => Carbon::createFromFormat('Y-m-d', $user->date1)->format('m/d/Y')
        ]);
    }
}




