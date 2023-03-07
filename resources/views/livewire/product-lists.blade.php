<div>


    

    <div class="row mb-3">

        <label for="name" class="col-md-8 col-form-label text-md-end">Search:</label>

        <div class="col-md-4">
            
           <input wire:model="search" class="form-control" type="text" placeholder="Search products..."/>            
           
        </div>
    </div>

    <ul>
        @foreach($productos as $product)
            
            {{-- <li>{{ $product->name }}</li> --}}

            <li>

                <div class="card mb-3">
                    <div class="card-body">
                      <h5 class="card-title">{{ $product->name }}</h5>
                      <p class="card-text">{{ $product->description }}</p>
                      <h6 class="card-subtitle mb-2 text-muted">Price:{{ $product->price }}</h6>
                      <a href="{{route('addtocart', ['product'=> $product])}}" class="btn btn-primary">Add to cart</a>
                    </div>
                  </div>

            </li>

        @endforeach

        {{ $productos->links('pagination::bootstrap-5') }}
    </ul>

</div>
