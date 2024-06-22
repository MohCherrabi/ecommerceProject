<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\On;
use Gloudemans\Shoppingcart\Facades\Cart;

class ShopingCartFile extends Component
{
    public $cartContent = array();
    public $cartContentGeneral = array();
    #[On('updateCartQuantity')]
    public function updateCartQuantity($qty, $rowId){
        Cart::update($rowId, $qty); // Will update the quantity
    }
    public function removeItemCart($rowId){
        Cart::remove($rowId);
    }

    public function clearAll(){
        Cart::destroy();
    }

    #[On('adedToCart')]
    #[On('updatedFromContent')]
    public function render()
    {
        $this->cartContentGeneral['nbItemCart'] = Cart::count();
        $this->cartContentGeneral['total'] = Cart::total();

        $cart = Cart::content();
        $this->cartContent  = array();
        $this->cartContentGeneral['nbItemCart'] = Cart::count();
        $this->cartContentGeneral['total'] = Cart::total();
        foreach($cart as $item){
            $product = Product::findorFail($item->id);
            array_push($this->cartContent,['id'=>$item->id,'price'=>$item->price,
                                            'rowId'=>$item->rowId,'new_price_ht'=>$product->new_price_ht,
                                            'qty'=>$item->qty,'image'=>$product->image,'name'=>$product->designation]);
        }
        $this->dispatch('cartUpdetedFromFile');
        return view('livewire.shoping-cart-file',['cartContent'=>$this->cartContent]);
    }
}
