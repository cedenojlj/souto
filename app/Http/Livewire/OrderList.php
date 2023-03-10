<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class OrderList extends Component
{

    use WithPagination;
    public $search='';
    
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.order-list',[
            'orders'=>Order::where('id','LIKE','%'.$this->search.'%')->where('user_id',Auth::id())->paginate(15),
        ]);
    }
}
