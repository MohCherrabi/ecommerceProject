<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\SubProduct;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class ShopingCart extends Component
{
    public $product =array();

    public function AddtoCart($product){
        // dd('helllo');
        $this->dispatch('adedToCart');
        $productAded = Product::where('id', $product)->first()->toArray();
        // dd($productAded);

        if(empty($productAded)){
            $productAded = SubProduct::where('id', $product)->first()->toArray();
            // dd($productAded);
        }
        $productAded['name'] =$productAded['designation'];
        $productAded['qty'] =1;
        if(empty($productAded['new_price_ht'])){
            $productAded['price'] = round($productAded['price_ht'] +($productAded['price_ht'] * ($productAded['VAT']/100)),2) ;
        }else{
            $productAded['price'] = round($productAded['new_price_ht'] +($productAded['new_price_ht'] * ($productAded['VAT']/100)),2);
        }
        Cart::add($productAded);
    }
    public function render()
    {
        return view('livewire.shoping-cart');
    }
}
