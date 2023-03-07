<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class ProductLists extends Component
{

    use WithPagination;
    public $search='';
    
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.product-lists', [
            'productos'=>Product::where('name','LIKE','%'.$this->search.'%')->where('user_id',Auth::id())->paginate(15),
        ]);
    }
}
