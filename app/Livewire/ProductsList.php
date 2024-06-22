<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\SubFamilie;
use Livewire\Component;
use Livewire\WithPagination;

class ProductsList extends Component
{
    use WithPagination;
    public $sub_familie = '';
    public function render()
    {
        $sub_families = SubFamilie::all();
        $products = Product::paginate(5);
        if(isset($this->sub_familie) && !empty($this->sub_familie)) {
            dd($this->sub_familie);
        $products = Product::where('sub_familie_id',$this->sub_familie)->paginate(5);
        }
        return view('livewire.products-list',['products' => $products,'sub_families'=>$sub_families,'sub_familie'=>$this->sub_familie]);
    }
}
