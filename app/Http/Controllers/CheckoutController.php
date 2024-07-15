<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShippingRequest;
use App\Models\Order;
use App\Models\Product;
use App\Models\Shipping;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class CheckoutController extends Controller
{
    public static function checkout(){
        $checkout = true; // this variable for testing in view for manage stups checkout
        $cartContentGeneral['nbItemCart'] = Cart::count();
        $cartContentGeneral['total'] = Cart::total();

        $cart = Cart::content();
        $cartContent  = array();
        $cartContentGeneral['nbItemCart'] = Cart::count();
        $cartContentGeneral['total'] = Cart::SubTotal();
        foreach($cart as $item){
            $product = Product::findorFail($item->id);
            array_push($cartContent,['id'=>$item->id,'price'=>$item->price,
                                            'rowId'=>$item->rowId,'new_price_ht'=>$product->new_price_ht,
                                            'qty'=>$item->qty,'image'=>$product->image,'name'=>$product->designation]);
        }
        return view('front-end.checkout',compact('cartContentGeneral','cartContent', 'checkout'));
    }
    public function shipping(ShippingRequest $request):void
    {
        // insert order information automatically
        $dataOrder = [ // data for order
            'date' => Carbon::now()->toDateString(), // Current date in 'YYYY-MM-DD' format
            'hour' => Carbon::now()->format('H:i:s'), // Current time in 'HH:MM:SS' format
            'payment' => false,
            'payment_mode_id' => $request->payment_mode_id,
            'status_id' => $request->status_id,
            'user_id' =>Auth::user()->id
        ];
        Order::create($dataOrder);

        // insert shipping information
        Shipping::create($request->all);
    }
}
