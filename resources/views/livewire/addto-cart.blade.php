<div>
   {{-- <p>{{'Este es el valor del producto '.$product->id}}</p> --}}
    
   <form wire:submit.prevent="agregarCarrito">
        @csrf


        {{-- para el campo cantidad total a distribuir--}}
        <div class="row mb-3">
            <label for="amount" class="col-md-4 col-form-label text-md-end">Quantity</label>

            <div class="col-md-6">
                <input id="amount" type="number" class="form-control @error('amount') is-invalid @enderror" name="amount" wire:model="amount" value="{{ old('amount') }}" required autocomplete="amount" autofocus>

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
                <p class="form-control"> {{$product->price}}</p>
            </div>
        </div>

        {{-- para el campo descuento notes --}}
        <div class="row mb-3">
            <label for="notes" class="col-md-4 col-form-label text-md-end">Notes</label>

            <div class="col-md-6">
                <input id="notes" type="number" step="0.01" class="form-control @error('notes') is-invalid @enderror" name="notes" wire:model="notes" value="{{ old('notes') }}" autocomplete="notes" autofocus>

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
                <input id="qtyone" type="number" class="form-control @error('qtyone') is-invalid @enderror" name="qtyone" wire:model="qtyone" value="{{ old('qtyone') }}" required autocomplete="qtyone" autofocus>

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
                <input id="qtytwo" type="number" class="form-control @error('qtytwo') is-invalid @enderror" name="qtytwo" wire:model="qtytwo" value="{{ old('qtytwo') }}" autocomplete="qtytwo" autofocus>

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
                <input id="qtythree" type="number" class="form-control @error('qtythree') is-invalid @enderror" name="qtythree" wire:model="qtythree" value="{{ old('qtythree') }}" autocomplete="qtythree" autofocus>

                @error('qtythree')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
              

        <div class="row mb-3">
            <label for="date1" class="col-md-4 col-form-label text-md-end">Date One</label>

            <div class="col-md-6">
                <input id="date1" type="date" class="form-control @error('date1') is-invalid @enderror" name="date1" wire:model="date1" value="{{ old('date1') }}" autocomplete="date1" autofocus required>

                @error('date1')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="date2" class="col-md-4 col-form-label text-md-end">Date Two</label>

            <div class="col-md-6">
                <input id="date2" type="date" class="form-control @error('date2') is-invalid @enderror" name="date2" wire:model="date2" value="{{ old('date2') }}" autocomplete="date2" autofocus>

                @error('date2')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="date3" class="col-md-4 col-form-label text-md-end">Date Three</label>

            <div class="col-md-6">
                <input id="date3" type="date" class="form-control @error('date3') is-invalid @enderror" name="date3" wire:model="date3" value="{{ old('date3') }}" autocomplete="date3" autofocus >

                @error('date3')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
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
