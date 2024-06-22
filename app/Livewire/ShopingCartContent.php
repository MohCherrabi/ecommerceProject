<?php

namespace App\Livewire;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Attributes\On;
use Livewire\Component;

class ShopingCartContent extends Component
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

    #[On('adedToCart')]
    #[On('cartUpdetedFromFile')]
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
        $this->dispatch('updatedFromContent');
        return view('livewire.shoping-cart-content',['cartContent'=>$this->cartContent]);
    }
}
