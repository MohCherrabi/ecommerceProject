<div class="product-category grid-style">
    <div id="top-functions-area" class="top-functions-area">
        <div class="flt-item to-left group-on-mobile">
            <span class="flt-title">Refine</span>
            <a href="#" class="icon-for-mobile">
                <span></span>
                <span></span>
                <span></span>
            </a>
            <div class="wrap-selectors">
                <span class="title-for-mobile">Refine Products By</span>
                <di data-title="Price:" class="selector-item">
                    <select name="price" wire:model.live="price" class="selector">
                        <option value="">All Price</option>
                        <option value="40">Less than 50Mad</option>
                        <option value="50">Mad50-100Mad</option>
                        <option value="100">Mad100-200Mad</option>
                        <option value="200">Mad200-450Mad</option>
                        <option value="500">Mad500-1000Mad</option>
                        <option value="1000">Mad1000-2000Mad</option>
                        <option value="2000">More than 2000Mad</option>
                    </select>

                <div data-title="Brand:" class="selector-item">
                    <select name="brad" wire:model.live="brand" class="selector">
                        <option value="">All Brands</option>
                        @foreach($brands as $brand)
                            <option value="{{$brand->id}}">{{$brand->brand}}</option>
                        @endforeach
                    </select>
                </div>
                <div data-title="Avalability:" class="selector-item">
                    <select id="select" wire:model.live="sub_familie" class="selector">
                        <option value="">All Categorys</option>
                        @foreach ($sub_families as $sub_familie)
                            <option value="{{ $sub_familie->id }}">{{ $sub_familie->label }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="flt-item to-right">
            <span class="flt-title">Sort</span>
            <div class="wrap-selectors">
                <div class="selector-item orderby-selector">
                    <select name="orderby" class="orderby" wire:model.live="sort" aria-label="Shop order">
                        <option value="menu_order" selected="selected">Default sorting</option>
                        <option value="popularity">popularity</option>
                        <option value="rating">average rating</option>
                        <option value="date">newness</option>
                        <option value="price">price: low to high</option>
                        <option value="price-desc">price: high to low</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <ul class="products-list">
            @if(count($products)== 0)
            <li class="product-item col-lg-4 col-md-4 col-sm-4 col-xs-6">No Product has this specifications</li>
            @endif
            @foreach ($products as $product)
                <li class="product-item col-lg-3 col-md-3 col-sm-3 col-xs-5">
                    <div class="contain-product layout-default">
                        <div class="product-thumb">
                            <a href="#" class="link-to-product">
                                <img src="{{ asset('storage/' . $product->image) }}" style="width: 270px ;height:270px;"
                                    alt="dd" width="270" height="270" class="product-thumnail">
                            </a>
                        </div>
                        <div class="info">
                            <b class="categories">{{ $product->sub_familie->label }}</b>
                            <h4 class="product-title"><a href="#" class="pr-name">{{ $product->designation }}</a>
                            </h4>
                            <div class="price ">
                                @if ($product->new_price_ht)
                                    <ins><span class="price-amount"><span class="currencySymbol">Mad</span>
                                            {{ round($product->new_price_ht + $product->new_price_ht * ($product->VAT / 100), 2) }}</span></ins>
                                    <del><span class="price-amount"><span class="currencySymbol">Mad</span>
                                            {{ round($product->price_ht + $product->price_ht * ($product->VAT / 100), 2) }}</span></del>
                                @else
                                    <ins><span class="price-amount"><span class="currencySymbol">Mad</span>
                                            {{ round($product->price_ht + $product->price_ht * ($product->VAT / 100), 2)  }}</span></ins>
                                @endif
                            </div>

                            <div class="slide-down-box">
                                <p class="message"> {{ $product->description }}</p>
                                <div class="buttons">
                                    <a href="#" class="btn wishlist-btn"><i class="fa fa-heart"
                                            aria-hidden="true"></i></a>
                                    @livewire('shoping-cart', ['product' => $product])
                                    <a href="#" class="btn compare-btn"><i class="fa fa-random"
                                            aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="biolife-panigations-block">
        {{ $products->links('vendor.pagination.custom') }}
    </div>

</div>
