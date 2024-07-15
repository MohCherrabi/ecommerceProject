<div class="shopping-cart-container">
    <div class="row">
        <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
            <h3 class="box-title">Your cart items</h3>
            <form class="shopping-cart-form" action="#" method="post">
                <table class="shop_table cart-form">
                    <thead>
                    <tr>
                        <th class="product-name">Product Name</th>
                        <th class="product-price">Price</th>
                        <th class="product-quantity">Quantity</th>
                        <th class="product-subtotal">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($cartContent as $item)
                            <tr class="cart_item">
                                <td class="product-thumbnail" data-title="Product Name">
                                    <a class="prd-thumb" href="#">
                                        <figure><img width="113" height="113" src="{{asset('storage/'.$item['image'])}}" alt="shipping cart"></figure>
                                    </a>
                                    <a class="prd-name" href="#">National Fresh Fruit</a>
                                    <div class="action">
                                        <a href="#"  wire:click='removeItemCart("{{ $item['rowId'] }}")' class="remove"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                    </div>
                                </td>
                                <td class="product-price" data-title="Price">
                                    <div class="price price-contain">
                                    @if ($item['new_price_ht'])
                                            <ins><span class="price-amount"><span
                                                        class="currencySymbol">Mad</span>
                                                    {{ $item['new_price_ht'] }}</span></ins>
                                            <del><span class="price-amount"><span
                                                        class="currencySymbol">Mad</span>
                                                    {{ $item['price'] }}</span></del>
                                        @else
                                            <ins><span class="price-amount"><span
                                                        class="currencySymbol">Mad</span>
                                                    {{ $item['price'] }}</span></ins>
                                        @endif
                                    </div>
                                </td>
                                <td class="product-quantity" data-title="Quantity">
                                    <div class="quantity-box type1">
                                        <div class="qty-input">
                                            <input type="number"
                                            @input.defer="$dispatch('updateCartQuantity',{qty: $event.target.value, rowId: '{{ $item['rowId'] }}' })"
                                            name="cart[id{{ $item['id'] }}][qty]"
                                            id="cart[id{{ $item['id'] }}][qty]" value="{{ $item['qty'] }}"
                                            data-max_value="20" data-min_value="1" data-step="1">
                                        </div>
                                    </div>
                                </td>
                                <td class="product-subtotal" data-title="Total">
                                    <div class="price price-contain">
                                        @if ($item['new_price_ht'])
                                            <ins><span class="price-amount"><span
                                                        class="currencySymbol">Mad</span>
                                                    {{ $item['new_price_ht'] * $item['qty'] }}</span></ins>
                                            <del><span class="price-amount"><span
                                                        class="currencySymbol">Mad</span>
                                                    {{ $item['price']  * $item['qty'] }}</span></del>
                                        @else
                                            <ins><span class="price-amount"><span
                                                        class="currencySymbol">Mad</span>
                                                    {{ $item['price']  * $item['qty']  }}</span></ins>
                                        @endif
                                    </div>
                                </td>
                            </tr>

                        @endforeach
                        <tr class="cart_item wrap-buttons">
                                <td class="wrap-btn-control" colspan="4">
                                    <a class="btn back-to-shop">Back to Shop</a>
                                    <button class="btn btn-clear" wire:click = 'clearAll' type="button">clear all</button>
                                </td>
                            </tr>
                    </tbody>
                </table>
            </form>
        </div>
        <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
            <div class="shpcart-subtotal-block">
                <div class="subtotal-line">
                    <b class="stt-name">Subtotal <span class="sub">({{$cartContentGeneral['nbItemCart']}}ittems)</span></b>
                    <span class="stt-price">Mad {{$cartContentGeneral['total']}}</span>
                </div>
                <div class="btn-checkout">
                    <a href="{{route('pay')}}" class="btn checkout">Check out</a>
                </div>

            </div>
        </div>
    </div>
</div>
