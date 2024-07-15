<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Product;
use App\Models\SubFamilie;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ProductsList extends Component
{
    use WithPagination;
    public $sub_familie = '';
    public $brand = '';
    public $price = '';

    public function render()
    {
        
        $sub_families = SubFamilie::all();
        $query = Product::query();
        $TopBrands = Product::select(DB::raw('brand_id, count(*) as nbBrand'))
            ->groupBy('brand_id')
            ->orderBy('nbBrand', 'desc')
            ->limit(30)
            ->get()
            ->pluck('brand_id');
        $brands = Brand::whereIn('id', $TopBrands)->get();

        if(!empty($this->sub_familie)) {
            $query->where('sub_familie_id', $this->sub_familie);
        }else{
            $query = Product::query();
            if(!empty($this->brand)){
                $query->where('brand_id', $this->brand);
            }
            if(!empty($this->price)){
                $this->price = (int) $this->price;
                if($this->price == 40){
                    $query->where('price_ht', '<',$this->price);
                }elseif($this->price == 2000){
                    $query->where('price_ht', '>',$this->price);
                }else{
                    $query->whereBetween('price_ht',[$this->price,$this->price*2]);
                }
            }
        }
        if(!empty($this->brand)){
            $query->where('brand_id', $this->brand);
        }else{
            $query = Product::query();
            if(!empty($this->sub_familie)) {
                $query->where('sub_familie_id', $this->sub_familie);
            }
            if(!empty($this->price)){
                $this->price = (int) $this->price;
                if($this->price == 40){
                    $query->where('price_ht', '<',$this->price);
                }elseif($this->price == 2000){
                    $query->where('price_ht', '>',$this->price);
                }else{
                    $query->whereBetween('price_ht',[$this->price,$this->price*2]);
                }
            }
        }
        if(!empty($this->price)){
            $this->price = (int) $this->price;
            if($this->price == 40){
                $query->where('price_ht', '<',$this->price);
            }elseif($this->price == 2000){
                $query->where('price_ht', '>',$this->price);
            }else{
                $query->whereBetween('price_ht',[$this->price,$this->price*2]);
            }
        }else{
            $query = Product::query();
            if(!empty($this->sub_familie)) {
                $query->where('sub_familie_id', $this->sub_familie);
            }
            if(!empty($this->brand)){
                $query->where('brand_id', $this->brand);
            }
        }
        $products = $query->paginate(5);
        return view('livewire.products-list', ['products' => $products, 'sub_families' => $sub_families, 'brands' => $brands]);
    }
}
