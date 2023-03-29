<div>
        
    <h5>{{Auth::user()->name}}</h5>  

                            
               @if ($mensajex)


                    @if ($mierror)

                            <div class="alert alert-danger" role="alert">
                                {{$mensajex}}
                            </div> 
                    
                        @else

                            <div class="alert alert-success" role="alert">
                                {{$mensajex}}
                            </div> 
                    
                        @endif   

                   
               @endif

              @if ($mostrarCheckout)

                <div class="row mt-2">

                    <div class="col">

                        <a class="btn btn-primary" href="{{route('checkout')}}">Checkout</a>

                    </div>

                </div>
                  
              @endif
               
            <div class="row mt-2">

              <div class="col">

                <button type="button" wire:click="save" name="" id="" class="btn btn-primary">checkout</button>

              </div>
            </div>

            {{-- <div>

                @foreach ($products as $i =>$product)

                                        
                        @error('amount.'.$i) 

                            <div class="alert alert-danger" role="alert">

                                {{$message}}

                            </div>                        
                          
                        
                        @enderror 

                @endforeach            
                
            </div> --}}

            

                <div class="table-responsive">

                    <table class="table table-sm">

                        <thead>
                            <tr>
                                <th scope="col">Order Qty</th>
                                {{-- <th scope="col">Item text</th> --}}
                                <th scope="col">Description</th>
                                <th scope="col">Scan Item UPC</th>
                                <th scope="col">Cases per Pallet</th>
                                <th scope="col">Food Show Deal</th>
                                <th scope="col">Notes</th>
                                <th scope="col">Final Price</th>
                                {{-- <th scope="col">{{Auth::user()->date1}}</th>
                                <th scope="col">{{Auth::user()->date2}}</th>
                                <th scope="col">{{Auth::user()->date3}}</th>  --}} 
                                <th scope="col">{{$fecha1}}</th>
                                <th scope="col">{{$fecha2}}</th>
                                <th scope="col">{{$fecha3}}</th> 

                                <th scope="col">Actions</th>                             
                            </tr>
                        </thead>
                        <tbody>
        
                        

                            

                            @foreach ($items as $key => $value)
        
                        
                        {{--  <tr class="{{$control == $key ? $status:''}}">   --}}

                            <tr class="{{empty($indicador[$key]) ? '': $indicador[$key]}}"> 
                                
                                
        
                                    {{-- @livewire('product-item', ['product' => $value], key($key)) --}}
        
                                {{--  <td> <button wire:click="agregar" type="button" class="btn btn-primary btn-sm">+</button> 
                                    <button wire:click="eliminar" type="button" class="btn btn-danger btn-sm">-</button> </th>     --}}
                        
                                    <td>
                                        <input wire:model="amount.{{$key}}" 
                                        id="amount" type="text"  
                                        class="form-control @error('amount.'.$key) is-invalid @enderror" 
                                        name="amount" required autofocus>
                                        
                                        <span class="error">
                                            @error('amount.'.$key) {{ $message }} @enderror
                                        </span>
        
                                        {{-- <span>
                                            {{ $control == $key ? $mensajex: ''}}
                                        </span> --}}
                                        
                                    </td>
                                    {{-- <td>{{$value[itemnumber}}</td> --}}
                                    <td>{{$value['description']}}</td>
                                    <td>{{$value['upc']}}</td>
                                    <td>{{$value['pallet']}}</td>
                                    <td>{{$value['price']}}</td>
        
        
                                    <td><input wire:model="notes.{{$key}}" 
                                        id="notes" type="text" 
                                        class="form-control @error('notes.'.$key) is-invalid @enderror" name="notes" >
                                    
                                        <span class="error">
                                            @error('notes.'.$key) {{ $message }} @enderror
                                        </span>
                                    
                                    </td>
        
        
                                    <td>{{!empty($notes[$key])? $value['price'] - $notes[$key] :$value['price']}}</td>
        
                            
                                    <td><input wire:model="qtyone.{{$key}}" 
                                        id="qtyone" type="text" 
                                        class="form-control @error('qtyone.'.$key) is-invalid @enderror" name="qtyone" required>
                                    
                                        
                                        <span class="error">
                                            @error('qtyone.'.$key) {{ $message }} @enderror
                                        </span>
        
                                    </td>
                            
                                    <td><input wire:model="qtytwo.{{$key}}"  
                                        id="qtytwo" type="text" 
                                        class="form-control @error('qtytwo.'.$key) is-invalid @enderror" name="qtytwo">
                                    
                                        <span class="error">
                                            @error('qtytwo.'.$key) {{ $message }} @enderror
                                        </span>
        
                                    </td>
                            
                                    <td><input wire:model="qtythree.{{$key}}" 
                                        id="qtythree" type="text"  
                                        class="form-control @error('qtythree.'.$key) is-invalid @enderror" name="qtythree">
                                    
                                        <span class="error">
                                            @error('qtythree.'.$key) {{ $message }} @enderror
                                        </span>
        
                                    </td> 
        
                                    <td> <button wire:click.prevent="incluir({{$key}})" type="button" class="btn btn-primary btn-sm">+</button> 
                                        <button wire:click.prevent="excluir({{$key}})" type="button" class="btn btn-danger btn-sm">-</button> </th>    
                                    
                            
                            
                            </tr> 
        
                            
        
                            @endforeach  
                            
                                

                        
                            
                        </tbody>

                    </table>

                </div>

            

            


</div>


