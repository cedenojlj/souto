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
            

            {{-- <div>

                @foreach ($products as $i =>$product)

                                        
                        @error('amount.'.$i) 

                            <div class="alert alert-danger" role="alert">

                                {{$message}}

                            </div>                        
                          
                        
                        @enderror 

                @endforeach            
                
            </div> --}}

            <table class="table">

                <thead>
                    <tr>
                        <th scope="col">Order Qty</th>
                        <th scope="col">Item Number</th>
                        <th scope="col">Description</th>
                        <th scope="col">Scan Item UPC</th>
                        <th scope="col">Cases per Pallet</th>
                        <th scope="col">Food Show Deal</th>
                        <th scope="col">Notes</th>
                        <th scope="col">Final Price</th>
                        <th scope="col">{{Auth::user()->date1}}</th>
                        <th scope="col">{{Auth::user()->date2}}</th>
                        <th scope="col">{{Auth::user()->date3}}</th>  
                        <th scope="col">Actions</th>                             
                    </tr>
                </thead>
                <tbody>

                   
                    @foreach ($products as $product)

                   
                    <tr class="{{$control == $product->id ? $status:''}}">  
                        
                        

                            {{-- @livewire('product-item', ['product' => $product], key($product->id)) --}}

                           {{--  <td> <button wire:click="agregar" type="button" class="btn btn-primary btn-sm">+</button> 
                            <button wire:click="eliminar" type="button" class="btn btn-danger btn-sm">-</button> </th>     --}}
                   
                            <td>
                                <input wire:model="amount.{{$product->id}}" 
                                id="amount" type="text" 
                                class="form-control @error('amount.'.$product->id) is-invalid @enderror" 
                                name="amount" required autofocus>
                                
                                <span class="error">
                                    @error('amount.'.$product->id) {{ $message }} @enderror
                                </span>

                                {{-- <span>
                                    {{ $control == $product->id ? $mensajex: ''}}
                                </span> --}}
                                
                            </td>
                            <td>{{$product->itemnumber}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->upc}}</td>
                            <td>{{$product->pallet}}</td>
                            <td>{{$product->price}}</td>


                            <td><input wire:model="notes.{{$product->id}}" 
                                id="notes" type="text" 
                                class="form-control @error('notes.'.$product->id) is-invalid @enderror" name="notes" >
                            
                                <span class="error">
                                    @error('notes.'.$product->id) {{ $message }} @enderror
                                </span>
                            
                            </td>


                            <td>{{!empty($notes[$product->id])? $product->price - $notes[$product->id] :$product->price}}</td>

                    
                            <td><input wire:model="qtyone.{{$product->id}}" 
                                id="qtyone" type="text" 
                                class="form-control @error('qtyone.'.$product->id) is-invalid @enderror" name="qtyone" required>
                            
                                
                                <span class="error">
                                    @error('qtyone.'.$product->id) {{ $message }} @enderror
                                </span>

                            </td>
                    
                            <td><input wire:model="qtytwo.{{$product->id}}"  
                                id="qtytwo" type="text" 
                                class="form-control @error('qtytwo.'.$product->id) is-invalid @enderror" name="qtytwo">
                            
                                 <span class="error">
                                    @error('qtytwo.'.$product->id) {{ $message }} @enderror
                                </span>

                            </td>
                    
                            <td><input wire:model="qtythree.{{$product->id}}" 
                                id="qtythree" type="text" 
                                class="form-control @error('qtythree.'.$product->id) is-invalid @enderror" name="qtythree">
                            
                                <span class="error">
                                    @error('qtythree.'.$product->id) {{ $message }} @enderror
                                </span>

                            </td> 

                            <td> <button wire:click.prevent="incluir({{$product->id}})" type="button" class="btn btn-primary btn-sm">+</button> 
                                <button wire:click.prevent="excluir({{$product->id}})" type="button" class="btn btn-danger btn-sm">-</button> </th>    
                               
                    
                    
                    </tr> 

                     

                     @endforeach                           
                    
                </tbody>
            </table>


</div>


