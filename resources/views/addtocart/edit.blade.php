@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (session('errores'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('errores') }}
                        </div>
                    @endif
                    
                    @php
                        
                        $carrito = session('carrito');                        

                    @endphp

                    <form method="POST" action="{{ route('updatecart') }}">
                        @csrf
                        @method('PUT')
                                
                        {{-- para el campo cantidad total a distribuir--}}
                        <div class="row mb-3">
                            <label for="amount" class="col-md-4 col-form-label text-md-end">Quantity</label>
                
                            <div class="col-md-6">
                                <input id="amount" type="number" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{ $carrito[$iditem]['amount'] }}" required autocomplete="amount" autofocus>
                
                                @error('amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">Price</label>
                
                            <div class="col-md-6">               
                                <p class="form-control"> {{$carrito[$iditem]['price']}}</p>
                            </div>
                        </div>
                
                        {{-- para el campo descuento notes --}}
                        <div class="row mb-3">
                            <label for="notes" class="col-md-4 col-form-label text-md-end">Notes</label>
                
                            <div class="col-md-6">
                                <input id="notes" type="number" step="0.01" class="form-control @error('notes') is-invalid @enderror" name="notes" value="{{ round($carrito[$iditem]['notes'],2) }}" autocomplete="notes" autofocus>
                
                                @error('notes')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                
                        {{-- para el campo cantidad uno--}}
                        <div class="row mb-3">
                            <label for="qtyone" class="col-md-4 col-form-label text-md-end">Quantity One</label>
                
                            <div class="col-md-6">
                                <input id="qtyone" type="number" class="form-control @error('qtyone') is-invalid @enderror" name="qtyone" value="{{ $carrito[$iditem]['qtyone']}}" required autocomplete="qtyone" autofocus>
                
                                @error('qtyone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                
                        {{-- para el campo cantidad dos--}}
                        <div class="row mb-3">
                            <label for="qtytwo" class="col-md-4 col-form-label text-md-end">Quantity two</label>
                
                            <div class="col-md-6">
                                <input id="qtytwo" type="number" class="form-control @error('qtytwo') is-invalid @enderror" name="qtytwo" value="{{ $carrito[$iditem]['qtytwo'] }}" autocomplete="qtytwo" autofocus>
                
                                @error('qtytwo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                
                        {{-- para el campo cantidad tres--}}
                        <div class="row mb-3">
                            <label for="qtythree" class="col-md-4 col-form-label text-md-end">Quantity three</label>
                
                            <div class="col-md-6">
                                <input id="qtythree" type="number" class="form-control @error('qtythree') is-invalid @enderror" name="qtythree" value="{{ $carrito[$iditem]['qtythree'] }}" autocomplete="qtythree" autofocus>
                
                                @error('qtythree')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                              
                
                        <div class="row mb-3">
                                            
                            <div class="col-md-6">
                                <input id="product_id" type="hidden" name="product_id" value="{{ $carrito[$iditem]['id'] }}" >  
                            </div>
                        </div>
                
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                   Add to Cart
                                </button>
                            </div>
                        </div>
                    </form>
                   
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


