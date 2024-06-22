<div class="product-category grid-style">

    <div id="top-functions-area" class="top-functions-area" >
        <div class="flt-item to-left group-on-mobile">
            <span class="flt-title">Refine</span>
            <a href="#" class="icon-for-mobile">
                <span></span>
                <span></span>
                <span></span>
            </a>
            <div class="wrap-selectors">
                <form action="#" name="frm-refine" method="get">
                    <span class="title-for-mobile">Refine Products By</span>
                    <div data-title="Price:" class="selector-item">
                        <select name="price" class="selector">
                            <option value="all">Price</option>
                            <option value="class-1st">Less than 50Mad</option>
                            <option value="class-2nd">Mad50-100Mad</option>
                            <option value="class-3rd">Mad100-200Mad</option>
                            <option value="class-4th">Mad200-450Mad</option>
                            <option value="class-5th">Mad450-1000Mad</option>
                            <option value="class-6th">Mad1000-1500Mad</option>
                            <option value="class-7th">More than 1500Mad</option>
                        </select>
                    </div>
                    <div data-title="Brand:" class="selector-item">
                        <select name="brad" class="selector">
                            <option value="all">Top brands</option>
                            <option value="br2">Brand first</option>
                            <option value="br3">Brand second</option>
                            <option value="br4">Brand third</option>
                            <option value="br5">Brand fourth</option>
                            <option value="br6">Brand fiveth</option>
                        </select>
                    </div>
                    {{-- <h1>hello{{$sub_familie}}</h1> --}}
                    <div data-title="Avalability:" class="selector-item">
                        <select name="sub_familie" id="select" wire:model.live='sub_familie' class="selector">
                            <option value="nnnn">Category</option>
                            @foreach($sub_families as $sub_familie)
                                <option value="{{$sub_familie->id}}">{{$sub_familie->label}}</option>
                            @endforeach
                        </select>
                    </div>
                    <p class="btn-for-mobile"><button type="submit" class="btn-submit">Go</button></p>
                </form>
            </div>
        </div>
        <div class="flt-item to-right">
            <span class="flt-title">Sort</span>
            <div class="wrap-selectors">
                <div class="selector-item orderby-selector">
                    <select name="orderby" class="orderby" aria-label="Shop order">
                        <option value="menu_order" selected="selected">Default sorting</option>
                        <option value="popularity">popularity</option>
                        <option value="rating">average rating</option>
                        <option value="date">newness</option>
                        <option value="price">price: low to high</option>
                        <option value="price-desc">price: high to low</option>
                    </select>
                </div>
                <div class="selector-item viewmode-selector">
                    <a href="category-grid-left-sidebar.html" class="viewmode grid-mode active"><i class="biolife-icon icon-grid"></i></a>
                    <a href="category-list-left-sidebar.html" class="viewmode detail-mode"><i class="biolife-icon icon-list"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <ul class="products-list">
            @foreach($products as $product)
            <li class="product-item col-lg-4 col-md-4 col-sm-4 col-xs-6">
                <div class="contain-product layout-default">
                    <div class="product-thumb">
                        <a href="#" class="link-to-product">
                            <img src="{{asset('storage/'.$product->image)}}" style="width: 270px ;height:270px;"  alt="dd" width="270" height="270" class="product-thumnail">
                        </a>
                    </div>
                    <div class="info">
                        <b class="categories">{{$product->sub_familie->label}}</b>
                        <h4 class="product-title"><a href="#" class="pr-name">{{$product->designation}}</a></h4>
                        <div class="price ">
                            @if ($product->new_price_ht)
                                <ins><span class="price-amount"><span
                                            class="currencySymbol">Mad</span>
                                        {{ round($product->new_price_ht + $product->new_price_ht * ($product->VAT / 100), 2) }}</span></ins>
                                <del><span class="price-amount"><span
                                            class="currencySymbol">Mad</span>
                                        {{ $product->price_ht }}</span></del>
                            @else
                                <ins><span class="price-amount"><span
                                            class="currencySymbol">Mad</span>
                                        {{ $product->price_ht }}</span></ins>
                            @endif
                        </div>

                        <div class="slide-down-box">
                            <p class="message"> {{ $product->description }}</p>
                            <div class="buttons">
                                <a href="#" class="btn wishlist-btn"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                @livewire('shoping-cart', ['product' => $product])
                                <a href="#" class="btn compare-btn"><i class="fa fa-random" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>

    <div class="biolife-panigations-block">
        {{ $products->links('vendor.pagination.custom')}}
    </div>

</div>
