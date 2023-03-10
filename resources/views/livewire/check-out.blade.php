<div>

    @if ($errores)

        <div class="alert alert-danger" role="alert">

            {{ $errores }}

        </div>
        
    @endif

    <div class="Container">

       
         {{-- search  --}}

        <div class="row mb-4">           

            <div class="col-md-6">                
                
                <input type="text" class="col form-control" wire:model.defer="search">               
            
            </div>

            <div class="col-md-6">                
                
                <button class="btn btn-primary" wire:click="CaptarIdCliente">Search</button>
            
            </div>
        </div> 


        <form wire:submit.prevent="submit">

            @if (!empty($search))

                 {{-- select customer  --}}

                <div class="row mb-3">

                    <div class="col-md-6">               
                    
                            <select wire:model="idCustomer" class="form-select @error('idCustomer') is-invalid @enderror" aria-label="Default select example">
        
                                <option selected>Open this select menu</option>
        
                                @foreach ($Customers as $item)
        
                                    <option value="{{$item->id}}">{{$item->name}}</option>
        
                                @endforeach                       
                                
                            </select> 

                            @error('idCustomer')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
        
                    </div>
        
                </div>
        
                {{-- email customer  --}}

                <div class="row mb-3">                
        
                    <div class="col-md-6">
        
                        <label for="email" class="col-form-label text-md-end">Email</label>
                        
                        <input wire:model="email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
        
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
        
                {{-- pin customer  --}}

                <div class="row mb-3">                
        
                    <div class="col-md-6">
        
                        <label for="pin" class="col-form-label">PIN</label>
        
                        <input wire:model="pin" id="pin" type="password" class="form-control @error('pin') is-invalid @enderror" name="pin" required >
        
                        @error('pin')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div> 

                {{-- rebate  --}}

                <div class="row mb-3">                
        
                    <div class="col-md-6">
        
                        <label for="rebate" class="col-form-label">Rebate</label>
        
                        <input wire:model="rebate" id="rebate" type="number" step=".01" class="form-control @error('rebate') is-invalid @enderror" name="rebate" >
        
                        @error('rebate')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div> 

                {{-- email rebate  --}}
                
                <div class="row mb-3">                
        
                    <div class="col-md-6">
        
                        <label for="rebateEmail" class="col-form-label text-md-end">Rebate Email</label>
                        
                        <input wire:model="rebateEmail" id="rebateEmail" type="email" class="form-control @error('rebateEmail') is-invalid @enderror" name="rebateEmail" value="{{ old('rebateEmail') }}">
        
                        @error('rebateEmail')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                {{-- comments  --}}
                
                <div class="row mb-3">                
        
                    <div class="col-md-6">
        
                        <label for="comments" class="col-form-label text-md-end">Comments</label>  
                         
                        <textarea wire:model="comments" class="form-control" name="comments" id="comments" rows="3"></textarea>  

                    </div>
                </div>

                {{-- submit  --}}

                <div class="row mb-0">

                    <div class="col-md-6">

                        <button type="submit" class="btn btn-primary">Checkout</button>  

                    </div>

                </div>
            
             @endif


        </form>

        
       
    </div>  

    
</div>
