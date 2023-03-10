<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    
    public function index()
    {
        $products = Product::paginate();

        return view('product.index', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * $products->perPage());
    }

   
    public function create()
    {
        $product = new Product();
        return view('product.create', compact('product'));
    }
    
    public function store(Request $request)
    {
        request()->validate(Product::$rules);

        $product = Product::create($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }
    
    public function show($id)
    {
        $product = Product::find($id);

        return view('product.show', compact('product'));
    }
    
    public function edit($id)
    {
        $product = Product::find($id);

        return view('product.edit', compact('product'));
    }

         
    public function update(Request $request, Product $product)
    {
        request()->validate(Product::$rules);

        $product->update($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully');
    }

    
    public function destroy($id)
    {
        $product = Product::find($id)->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully');
    }


    public function addtoCart(Product $product)
    {
        //return view('addtocart.create', compact('product'));
        return view('addtocart.agregar', compact('product'));
    }

    public function savetocart(Request $request)
    {
        
        $request->validate([

            'amount'=>'required',
            'qtyone' => 'required',

        ]);
        
        $product = Product::find($request->input('product_id'));

        $finalprice = $product->price - $request->input('notes');

        $item = [

            $request->input('product_id') => [

                'id'=>$product->id,
                'name'=>$product->name,
                'price'=>$product->price,
                'amount' => $request->input('amount'),
                'notes' => $request->input('notes'),
                'qtyone' => $request->input('qtyone'),
                'qtytwo' => $request->input('qtytwo'),
                'qtythree' => $request->input('qtythree'),                
                'finalprice' => $finalprice,

            ]

        ];

        $amount= $request->input('amount');
        $qtyone= $request->input('qtyone');
        $qtytwo= $request->input('qtytwo');
        $qtythree= $request->input('qtythree');

        $sumacantidad = $qtyone + $qtytwo + $qtythree;       

        $revisar = ($amount==$sumacantidad);      
       

       if ($revisar) {

        //cantidades correctas                      
                   
        }else{

            return redirect()->route('addtocart', $request->input('product_id'))
            ->with('errores', 'The quantity must be equal to 
            the sum of the quantity One, two and three'); 

        }  
        
        $carrito = $request->session()->get('carrito');

        if (!$request->session()->has('carrito')) {            

            $request->session()->put('carrito', $item);

        } else {

            if (Arr::exists($carrito, $request->input('product_id'))) {                

                return redirect()->route('home')
                    ->with('errores', 'This product exists, please select another');

            } else {

                $carrito[$request->input('product_id')] = [

                    'id'=>$product->id,
                    'name'=>$product->name,
                    'price'=>$product->price,
                    'amount' => $request->input('amount'),
                    'notes' => $request->input('notes'),
                    'qtyone' => $request->input('qtyone'),
                    'qtytwo' => $request->input('qtytwo'),
                    'qtythree' => $request->input('qtythree'),                    
                    'finalprice' => $finalprice,
                ];

                $request->session()->put('carrito', $carrito);
                
            }
        }
       

        return redirect()->route('home')->with('status', 'Product added successfully');
       
    }

    public function cartlist()
    {
        return view('cartlist');
    }

    public function cartdestroy(Request $request)
    {
        
        $carrito = session('carrito');        
        
        if (Arr::exists($carrito, $request->input('id'))) {  
            
            unset($carrito[$request->input('id')]);

            session()->put('carrito', $carrito);

            return redirect()->route('cartlist')
            ->with('status', 'Product deleted successfully');

        }

       
    }

    public function cartedit($id)
    {
       $iditem=$id;

        return view('addtocart.edit', compact('iditem'));
    }

    public function updatecart(Request $request)
    {
       
       
        $request->validate([

            'amount'=>'required',
            'qtyone' => 'required',

        ]);
        
        $product = Product::find($request->input('product_id'));

        $finalprice = $product->price - $request->input('notes');        

        $amount= $request->input('amount');
        $qtyone= $request->input('qtyone');
        $qtytwo= $request->input('qtytwo');
        $qtythree= $request->input('qtythree');

        $sumacantidad = $qtyone + $qtytwo + $qtythree;       

        $revisar = ($amount==$sumacantidad);      
       

       if ($revisar) {

        //cantidades correctas                      
                   
        }else{

            return redirect()->route('cart.edit', $request->input('product_id'))
            ->with('errores', 'The quantity must be equal to 
            the sum of the quantity One, two and three'); 

        }  

        $carrito = $request->session()->get('carrito');

        if (Arr::exists($carrito, $request->input('product_id'))) {  
            
                    $carrito[$product->id]['id'] = $product->id;
                    $carrito[$product->id]['name'] = $product->name;
                    $carrito[$product->id]['price'] = $product->price;
                    $carrito[$product->id]['amount'] =  $request->input('amount');
                    $carrito[$product->id]['notes'] =  $request->input('notes');
                    $carrito[$product->id]['qtyone'] =  $request->input('qtyone');
                    $carrito[$product->id]['qtytwo'] =  $request->input('qtytwo');
                    $carrito[$product->id]['qtythree'] =  $request->input('qtythree');                    
                    $carrito[$product->id]['finalprice'] =  $finalprice; 

                    $request->session()->put('carrito', $carrito);

                    //dd($carrito[$product->id]);         

                    return redirect()->route('cartlist')->with('status', 'Product Updated successfully');

        }

    }

    public function checkout()
    {
        return view('checkout');
    }
}
