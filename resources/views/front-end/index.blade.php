@extends('front-end.layouts.layout')
@section('title', 'Home')
@section('content2')

<div id="main-content" class="main-content">
    <!-- Block 01: Main slide block-->
    <div class="main-slide block-slider">
        <ul class="biolife-carousel nav-none-on-mobile"
            data-slick='{"arrows": true, "dots": false, "slidesMargin": 0, "slidesToShow": 1, "infinite": true, "speed": 800}'>
            <li>
                <div class="slide-contain slider-opt03__layout01 mode-03 black-color slide-bgr-mode03-01">
                    <div class="media"></div>
                    <div class="text-content">
                        <i class="first-line">Pomegranate</i>
                        <h3 class="second-line">Fresh Juice. 100% Organic</h3>
                        <p class="third-line">A blend of freshly squeezed green apple & fruits</p>
                        <p class="buttons">
                            <a href="#" class="btn btn-bold">Shop now</a>
                            <a href="#" class="btn btn-thin">View lookbook</a>
                        </p>
                    </div>
                </div>
            </li>
            <li>
                <div class="slide-contain slider-opt03__layout01 mode-03 slide-bgr-mode03-02">
                    <div class="media">
                    </div>
                    <div class="text-content">
                        <i class="first-line">Pomegranate</i>
                        <h3 class="second-line">Fresh Juice. 100% Organic</h3>
                        <p class="third-line">A blend of freshly squeezed green apple & fruits</p>
                        <p class="buttons">
                            <a href="#" class="btn btn-bold">Shop now</a>
                            <a href="#" class="btn btn-thin">View lookbook</a>
                        </p>
                    </div>
                </div>
            </li>
            <li>
                <div class="slide-contain slider-opt03__layout01 mode-03 slide-bgr-mode03-03">
                    <div class="media">
                    </div>
                    <div class="text-content">
                        <i class="first-line">Pomegranate</i>
                        <h3 class="second-line">Fresh Juice. 100% Organic</h3>
                        <p class="third-line">A blend of freshly squeezed green apple & fruits</p>
                        <p class="buttons">
                            <a href="#" class="btn btn-bold">Shop now</a>
                            <a href="#" class="btn btn-thin">View lookbook</a>
                        </p>
                    </div>
                </div>
            </li>
        </ul>
    </div>

    <!-- Block 02: Grid Banners-->
    {{-- <div class="biolife-gird-banners xs-margin-top-80px sm-margin-top-0">

        <div class="grid-panel">

            <div class="grid-panel-item left-content">
                <div class="biolife-banner grid biolife-banner__grid type-02 bn-elm-01">
                    <a href="#" class="media-contain media-01"></a>
                    <div class="banner-contain">
                        <a href="#" class="cat-name">Fruit juice</a>
                    </div>
                </div>
            </div>

            <div class="grid-panel-item midle-content">
                <ul class="list-media">
                    <li>
                        <div class="biolife-banner grid biolife-banner__grid type-02 bn-elm-02">
                            <a href="#" class="media-contain media-02"></a>
                            <div class="banner-contain">
                                <a href="#" class="cat-name">Strawberry</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="biolife-banner grid biolife-banner__grid type-02 bn-elm-03">
                            <a href="#" class="media-contain media-03"></a>
                            <div class="banner-contain">
                                <a href="#" class="cat-name">Blueberries</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="biolife-banner grid biolife-banner__grid type-02 bn-elm-04">
                            <a href="#" class="media-contain media-04"></a>
                            <div class="banner-contain">
                                <a href="#" class="cat-name">Raspberries</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="biolife-banner grid biolife-banner__grid type-02 bn-elm-05">
                            <a href="#" class="media-contain  media-05"></a>
                            <div class="banner-contain">
                                <a href="#" class="cat-name">Our berries</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="grid-panel-item right-content">
                <div class="biolife-banner grid biolife-banner__grid type-02 bn-elm-06">
                    <a href="#" class="media-contain media-06"></a>
                    <div class="banner-contain">
                        <a href="#" class="cat-name">Pomegranate</a>
                    </div>
                </div>
            </div>

        </div>

    </div> --}}

    <!-- Block 03: Product Tab-->

    <div class="product-tab z-index-20 sm-margin-top-49px xs-margin-top-80px">
        <div class="container">
            <div class="biolife-title-box biolife-title-box__icon-at-top-style hidden-icon-on-mobile">

                <h3 class="main-title">Bestseller Products</h3>
            </div>
            <div class="biolife-tab biolife-tab-contain sm-margin-top-32px">
                <div class="tab-head tab-head__icon-top-layout icon-top-layout background-tab-include type-02">
                    <ul class="tabs">
                        @foreach ($sub_families as $sub_familie)
                            <li class="tab-element {{ $loop->first ? ' active' : '' }}">
                                <a href="#{{ $sub_familie->label }}" class="tab-link">
                                    <span>{{ $sub_familie->label }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="tab-content">
                    @foreach ($sub_families as $sub_familie)
                        <div id="{{ $sub_familie->label }}" class="tab-contain {{ $loop->first ? 'active' : '' }}">
                            <ul class="products-list biolife-carousel nav-center-02 nav-none-on-mobile eq-height-contain"
                                data-slick='{"rows":1 ,"arrows":true,"dots":false,"infinite":true,"speed":400,"slidesMargin":10,"slidesToShow":4, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 4}},{"breakpoint":992, "settings":{ "slidesToShow": 3, "slidesMargin":30}},{"breakpoint":768, "settings":{ "slidesToShow": 2, "rows":2, "slidesMargin":15}}]}'>
                                @foreach ($products as $product)
                                    @if ($product->sub_familie_id == $sub_familie->id)
                                        <li class="product-item">
                                            <div class="contain-product layout-default">
                                                <div class="product-thumb">
                                                    <a href="#" class="link-to-product">
                                                        @if (!isset($product->image))
                                                            <img src="{{ asset('assets2/images/home-01/defautl-image-product.png') }}"
                                                                alt="Product" width="270" height="270"
                                                                class="product-thumnail">
                                                        @else
                                                            <img src="{{ asset('storage/' . $product->image) }}"
                                                                alt="Product" width="270" height="270"
                                                                style="width: 270px !important;height:270px !important;"
                                                                class="product-thumnail">
                                                        @endif
                                                    </a>
                                                    <a class="lookup btn_call_quickview " href="#"><i
                                                            class="biolife-icon icon-search"></i></a>
                                                    {{-- <div id="biolife-quickview-block"
                                                    class="biolife-quickview-block">
                                                    <div class="quickview-container">
                                                        <a href="#" class="btn-close-quickview"
                                                            data-object="open-quickview-block"><span
                                                                class="biolife-icon icon-close-menu"></span></a>
                                                        <div class="biolife-quickview-inner">
                                                            <div class="media">
                                                                <ul class="biolife-carousel quickview-for"
                                                                    data-slick='{"arrows":false,"dots":false,"slidesMargin":30,"slidesToShow":1,"slidesToScroll":1,"fade":true,"asNavFor":".quickview-nav"}'>
                                                                    <li><img src="{{ asset('storage/' . $product->image) }}"
                                                                            alt="" width="500" height="500">
                                                                    </li>
                                                                </ul>
                                                                <ul class="biolife-carousel quickview-nav"
                                                                    data-slick='{"arrows":true,"dots":false,"centerMode":false,"focusOnSelect":true,"slidesMargin":10,"slidesToShow":3,"slidesToScroll":1,"asNavFor":".quickview-for"}'>
                                                                    <li><img src="{{ asset('storage/' . $product->image) }}"
                                                                            alt="" width="88" height="88">
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="product-attribute">
                                                                <h4 class="title"><a href="#"
                                                                        class="pr-name">{{$product->designation}}</a></h4>
                                                                <div class="rating">
                                                                    <p class="star-rating"><span
                                                                            class="width-80percent"></span></p>
                                                                </div>
                                                                <div class="price price-contain ">
                                                                    @if ($product->new_price_ht)
                                                                        <ins><span class="price-amount"><span
                                                                                    class="currencySymbol">Mad</span>
                                                                                {{ round($product->new_price_ht + ($product->new_price_ht * ($product->VAT/100)),2) }}</span></ins>
                                                                        <del><span class="price-amount"><span
                                                                                    class="currencySymbol">Mad</span>
                                                                                {{ round($product->price_ht + ($product->price_ht * ($product->VAT/100)),2) }}</span></del>
                                                                    @else
                                                                        <ins><span class="price-amount"><span
                                                                                    class="currencySymbol">Mad</span>
                                                                                {{ round($product->price_ht + ($product->price_ht * ($product->VAT/100)),2) }}</span></ins>
                                                                    @endif
                                                                </div>
                                                                <p class="excerpt">{{$product->description}}</p>
                                                                <div class="from-cart">
                                                                    <div class="qty-input">
                                                                        <input type="text" name="qty12554"
                                                                            value="1" data-max_value="20"
                                                                            data-min_value="1" data-step="1">
                                                                        <a href="#" class="qty-btn btn-up"><i
                                                                                class="fa fa-caret-up"
                                                                                aria-hidden="true"></i></a>
                                                                        <a href="#" class="qty-btn btn-down"><i
                                                                                class="fa fa-caret-down"
                                                                                aria-hidden="true"></i></a>
                                                                    </div>
                                                                    <div class="buttons">
                                                                        <a href="#"
                                                                            class="btn add-to-cart-btn btn-bold">add to
                                                                            cart</a>
                                                                    </div>
                                                                </div>

                                                                <div class="product-meta">
                                                                    <div class="product-atts">
                                                                        <div class="product-atts-item">
                                                                            <b class="meta-title">Categories:</b>
                                                                            <ul class="meta-list">
                                                                                <li><a href="#"
                                                                                        class="meta-link">{{$sub_familie->label}}</a>
                                                                                </li>
                                                                                <li><a href="#"
                                                                                        class="meta-link">{{$sub_familie->familie->label}}</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="product-atts-item">
                                                                            <b class="meta-title">Brand:</b>
                                                                            <ul class="meta-list">
                                                                                <li><a href="#"
                                                                                        class="meta-link">
                                                                                        @foreach ($brands as $brand)
                                                                                            @if ($brand->id == $product->brand_id)
                                                                                               {{ $brand->brand}}
                                                                                            @endif
                                                                                        @endforeach
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <span class="sku">SKU: N/A</span>
                                                                    <div class="biolife-social inline add-title">
                                                                        <span class="fr-title">Share:</span>
                                                                        <ul class="socials">
                                                                            <li><a href="#" title="twitter"
                                                                                    class="socail-btn"><i
                                                                                        class="fa fa-twitter"
                                                                                        aria-hidden="true"></i></a></li>
                                                                            <li><a href="#" title="facebook"
                                                                                    class="socail-btn"><i
                                                                                        class="fa fa-facebook"
                                                                                        aria-hidden="true"></i></a></li>
                                                                            <li><a href="#" title="pinterest"
                                                                                    class="socail-btn"><i
                                                                                        class="fa fa-pinterest"
                                                                                        aria-hidden="true"></i></a></li>
                                                                            <li><a href="#" title="youtube"
                                                                                    class="socail-btn"><i
                                                                                        class="fa fa-youtube"
                                                                                        aria-hidden="true"></i></a></li>
                                                                            <li><a href="#" title="instagram"
                                                                                    class="socail-btn"><i
                                                                                        class="fa fa-instagram"
                                                                                        aria-hidden="true"></i></a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                                </div>
                                                <script>
                                                    //     const products = @json($productsForModal);

                                                    //     products.forEach(product => {
                                                    //         const element = document.getElementById('biolife-quickview-block' + product.id);
                                                    //         if (element) {
                                                    //             document.addEventListener('click', function(e) {
                                                    //                 const target = e.target;
                                                    //                 if (target.classList.contains('btn_call_quickview') && target.classList.contains(product
                                                    //                         .designation + product.id)) {
                                                    //                     e.preventDefault();
                                                    //                     document.body.dispatchEvent(new CustomEvent('open-overlay', {
                                                    //                         detail: 'open-quickview-block'
                                                    //                     }));
                                                    //                     const modal = document.getElementById('biolife-quickview-block-popup');
                                                    //                     if (modal) {
                                                    //                         modal.style.display = 'block';
                                                    //                     }
                                                    //                 }
                                                    //             });
                                                    //         }
                                                    //     });
                                                </script>
                                                <div class="info">
                                                    <b class="categories">{{ $sub_familie->familie->label }}</b>
                                                    <h4 class="product-title">
                                                        <a href="#" class="pr-name">{{ $product->designation }}</a>
                                                    </h4>
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
                                                        <p class="message">
                                                            {{ $product->description }}
                                                        </p>
                                                        <div class="buttons">
                                                            <a href="#" class="btn wishlist-btn"><i
                                                                    class="fa fa-heart" aria-hidden="true"></i></a>
                                                            @livewire('shoping-cart', ['product' => $product])

                                                            <a href="#" class="btn compare-btn"><i
                                                                    class="fa fa-random" aria-hidden="true"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Block 04: Banners-->
    <div class="banner-block md-margin-top-61px sm-margin-bottom-89px xs-margin-top-60px">
        <div class="biolife-banner special-02 biolife-banner__special-02">
            <div class="container">
                @foreach ($AllProducts as $product)
                    @if ($product->special_offer == 1)
                        <div class="banner-contain">
                            <div class="thumb">
                                <a href="#" class="link"><img src="{{ asset('storage/' . $product->image) }}"
                                        width="753" height="517"
                                        style="height: 517px !important;width:753px !important;" alt=""></a>
                            </div>

                            <div class="text-content">
                                <i class="text01">{{ $product->sub_familie->label }}</i>
                                <b class="text02">Special Offer</b>
                                <span class="text03">{{ $product->designation }}</span>
                                <div class="product-detail">
                                    <h4 class="product-name">{{ $product->description }}</h4>
                                    <div class="price price-contain">
                                        @if ($product->new_price_ht)
                                            <ins><span class="price-amount"><span class="currencySymbol">Mad</span>
                                                    {{ $product->priceTTC() }}</span></ins>
                                            <del><span class="price-amount"><span class="currencySymbol">Mad</span>
                                                    {{ $product->priceTTC2() }}</span></del>
                                        @else
                                            <ins><span class="price-amount"><span class="currencySymbol">Mad</span>
                                                    {{ $product->priceTTC() }}</span></ins>
                                        @endif
                                    </div>2
                                    {{-- <p class="measure">per kilogram</p> --}}
                                    <div class="buttons">2
                                        {{-- <a href="#" class="btn add-to-cart-btn" tabindex="-1">add to cart</a> --}}
                                        @livewire('shoping-cart', ['product' => $product])
                                    </div>2
                                </div>
                            </div>

                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <!-- Block 05: Banner Promotion-->
    {{-- <div class="banner-promotion xs-margin-top-0 sm-margin-top-60px xs-margin-top-100">
        <div class="biolife-banner promotion6 biolife-banner__promotion6">
            <div class="banner-contain">
                <div class="media">
                    <div class="img-moving position-1">
                        <a href="#" class="banner-link">
                            <img src="assets2/images/home-01/bn-promotion-6-child-01.png" width="568" height="760"
                                alt="img msv">
                        </a>
                    </div>
                    <div class="img-moving position-2">
                        <img src="assets2/images/home-01/bn-promotion-6-child-02.png" width="745" height="682"
                            alt="img msv">
                    </div>
                </div>
                <div class="text-content">
                    <i class="text1">Sumer Fruit</i>
                    <b class="text2">100% Pure Natural Fruit Juice</b>
                    <p class="buttons">
                        <a href="#" class="btn btn-thin">Shop Now</a>
                    </p>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Block 06: Product Tab-->
    <div class="product-tab z-index-20 sm-margin-top-71px xs-margin-top-80px">
        <div class="container">
            <div
                class="biolife-title-box biolife-title-box__icon-at-top-style hidden-icon-on-mobile sm-margin-bottom-24px">
                <h3 class="main-title">Our Products</h3>
            </div>
            <div class="biolife-tab biolife-tab-contain">
                <div class="tab-head tab-head__sample-layout type-02 xs-margin-bottom-15px ">
                    <ul class="tabs">
                        @foreach ($subFamilies as $subFamilie)
                            <li class="tab-element {{ $loop->first ? 'active' : '' }}">
                                <a href="#{{ $subFamilie->label }}" class="tab-link">{{ $subFamilie->label }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="tab-content">
                    @foreach ($subFamilies as $sub_familie)
                        <div id="{{ $sub_familie->label }}" class="tab-contain {{ $loop->first ? 'active' : '' }}">
                            <ul class="products-list biolife-carousel nav-center-02 nav-none-on-mobile eq-height-contain"
                                data-slick='{"rows":2 ,"arrows":true,"dots":false,"infinite":true,"speed":400,"slidesMargin":10,"slidesToShow":4, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 4}},{"breakpoint":992, "settings":{ "slidesToShow": 3, "slidesMargin": 30}},{"breakpoint":768, "settings":{ "slidesToShow": 2, "slidesMargin": 15}}]}'>
                                @foreach ($sub_familie->products as $product)
                                    <li class="product-item">
                                        <div class="contain-product layout-default">
                                            <div class="product-thumb">
                                                <a href="#" class="link-to-product">
                                                    @if (!isset($product->image))
                                                        <img src="{{ asset('assets2/images/home-01/defautl-image-product.png') }}"
                                                            alt="Product" width="270" height="270"
                                                            class="product-thumnail">
                                                    @else
                                                        <img src="{{ asset('storage/' . $product->image) }}"
                                                            alt="Product" width="270" height="270"
                                                            style="width: 270px !important;height:270px !important;"
                                                            class="product-thumnail">
                                                    @endif
                                                </a>
                                                <a class="lookup btn_call_quickview" href="#"><i
                                                        class="biolife-icon icon-search"></i></a>
                                            </div>
                                            <div class="info">
                                                <b class="categories">{{ $sub_familie->familie->label }}</b>
                                                <h4 class="product-title"><a href="#"
                                                        class="pr-name">{{ $product->designation }}</a></h4>
                                                <div class="price ">
                                                    @if ($product->new_price_ht)
                                                        <ins><span class="price-amount"><span
                                                                    class="currencySymbol">Mad</span>
                                                                {{ $product->priceTTC() }}</span></ins>
                                                        <del><span class="price-amount"><span
                                                                    class="currencySymbol">Mad</span>
                                                                {{ $product->priceTTC2() }}</span></del>
                                                    @else
                                                        <ins><span class="price-amount"><span
                                                                    class="currencySymbol">Mad</span>
                                                                {{ $product->priceTTC() }}</span></ins>
                                                    @endif

                                                </div>
                                                <div class="slide-down-box">
                                                    <p class="message">
                                                        {{ $product->description }}
                                                    </p>
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
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Block 07: Blog posts-->
    <div class="blog-posts sm-margin-top-49px xs-margin-top-60px">
        <div class="container">
            <div class="biolife-title-box biolife-title-box__bold-center xs-margin-bottom-50px sm-margin-bottom-0-im">
                <h3 class="main-title">Our Latest Articles</h3>
            </div>
            <ul class="biolife-carousel nav-center xs-margin-top-34px nav-none-on-mobile"
                data-slick='{"rows":1,"arrows":true,"dots":false,"infinite":false,"speed":400,"slidesMargin":30,"slidesToShow":3, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 3}},{"breakpoint":992, "settings":{ "slidesToShow": 2}},{"breakpoint":768, "settings":{ "slidesToShow": 2}},{"breakpoint":600, "settings":{ "slidesToShow": 1}}]}'>
                @foreach($blogs as $blog)
                <li>
                    <div class="post-item effect-01 style-bottom-info layout-02 ">
                        <div class="thumbnail">
                            <a href="#" class="link-to-post"><img src="{{asset('storage/'.$blog->image)}}"
                                    width="370" height="270" alt=""></a>
                            <div class="post-date">
                                <span class="date">{{ $blog->created_at->format('d') }}</span>
                                <span class="month">{{ $blog->created_at->format('M') }}</span>
                            </div>
                        </div>
                        <div class="post-content">
                            <h4 class="post-name"><a href="#" class="linktopost">{{$blog->title}}</a></h4>
                            <div class="post-meta">
                                <a href="#" class="post-meta__item author"><img
                                        src="assets2/images/home-03/post-author.png" width="28" height="28"
                                        alt=""><span>{{$blog->user->first_name}}</span></a>
                                <a href="#" class="post-meta__item btn liked-count">{{$blog->comments->count()}}<span
                                        class="biolife-icon icon-comment"></span></a>
                                <a href="#" class="post-meta__item btn comment-count">6<span
                                        class="biolife-icon icon-like"></span></a>
                                <div class="post-meta__item post-meta__item-social-box">
                                    <span class="tbn"><i class="fa fa-share-alt" aria-hidden="true"></i></span>
                                    <div class="inner-content">
                                        <ul class="socials">
                                            <li><a href="#" title="twitter" class="socail-btn"><i
                                                        class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                            <li><a href="#" title="facebook" class="socail-btn"><i
                                                        class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                            <li><a href="#" title="pinterest" class="socail-btn"><i
                                                        class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                            <li><a href="#" title="youtube" class="socail-btn"><i
                                                        class="fa fa-youtube" aria-hidden="true"></i></a></li>
                                            <li><a href="#" title="instagram" class="socail-btn"><i
                                                        class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <p class="excerpt">{{ Illuminate\Support\Str::limit($blog->description, $limit = 150, $end = '...') }}</p>
                            <div class="group-buttons">
                                <a href="{{route('blogs.show',$blog->id)}}" class="btn readmore">continue reading</a>
                            </div>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

    <!-- Block 08: Advance Product-->
    <div class="banner-block">
        <div class="biolife-banner special-03 biolife-banner__special-03">
            <div class="banner-contain">
                <div class="container">
                    <div class="biolife-title-box bgrd-bold biolife-title-box__bgrd-bold">
                        <h3 class="title">Sub product</h3>
                    </div>
                    <ul class="products-list vertical-layout-02 biolife-carousel nav-none-on-mobile"
                        data-slick='{"rows":3,"arrows":false,"dots":false,"infinite":false,"speed":400,"slidesMargin":30,"slidesToShow":1, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 1}},{"breakpoint":768, "settings":{ "slidesToShow": 3, "rows":2, "slidesMargin":10}},{"breakpoint":500, "settings":{ "slidesToShow": 2, "rows":2, "slidesMargin":15}}]}'>
                        @foreach ($sub_products as $product)
                            <li class="product-item">
                                <div class="contain-product contain-product__right-info-layout3">
                                    <div class="product-thumb">
                                        <a href="#" class="link-to-product">
                                            <img src="{{ asset('storage/' . $product->image) }}" alt="Vegetables"
                                                width="270" height="270" class="product-thumnail">
                                        </a>
                                    </div>
                                    <div class="info">
                                        <h4 class="product-title"><a href="#"
                                                class="pr-name">{{ $product->designation }}</a></h4>
                                        <div class="price ">
                                            @if ($product->new_price_ht)
                                                <ins><span class="price-amount"><span class="currencySymbol">Mad</span>
                                                        {{ $product->priceTTC() }}</span></ins>
                                                <del><span class="price-amount"><span class="currencySymbol">Mad</span>
                                                        {{ $product->priceTTC2() }}</span></del>
                                            @else
                                                <ins><span class="price-amoun2t"><span class="currencySymbol">Mad</span>
                                                        {{ $product->priceTTC() }}</span></ins>
                                            @endif
                                        </div>22
                                        <div class="rating">
                                            <p class="star-rating"><span class="width-80percent"></span></p>
                                            <span class="review-count">(05 Re2views)</span>
                                        </div>
                                        <p class="desc">{{ $product->description }}</p>
                                        <div class="buttons">
                                            @livewire('shoping-cart', ['product' => $product])
                                            <a href="#" class="btn wishlist-btn" tabindex="0"><i
                                                    class="fa fa-heart" aria-hidden="true"></i></a>
                                            <a href="#" class="btn compare-btn" tabindex="0"><i
                                                    class="fa fa-random" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Block 10: Brands-->
    <div class="brand-slide sm-margin-top-76px sm-margin-bottom-77px xs-margin-top-80px xs-margin-bottom-80px">
        <div class="container">
            <ul class="biolife-carousel nav-center-bold nav-none-on-mobile"
                data-slick='{"rows":1,"arrows":true,"dots":false,"infinite":false,"speed":400,"slidesMargin":30,"slidesToShow":4, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 4}},{"breakpoint":992, "settings":{ "slidesToShow": 3, "slidesMargin": 10}},{"breakpoint":768, "settings":{ "slidesToShow": 2, "slidesMargin": 10}}]}'>
                <li>
                    <div class="biolife-brd-container transparent-effect">
                        <a href="#" class="link">
                            <figure><img src="assets2/images/home-01/brd-01.png" width="199" height="110"
                                    alt=""></figure>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="biolife-brd-container transparent-effect">
                        <a href="#" class="link">
                            <figure><img src="assets2/images/home-01/brd-02.png" width="199" height="110"
                                    alt=""></figure>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="biolife-brd-container transparent-effect">
                        <a href="#" class="link">
                            <figure><img src="assets2/images/home-01/brd-03.png" width="199" height="110"
                                    alt=""></figure>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="biolife-brd-container transparent-effect">
                        <a href="#" class="link">
                            <figure><img src="assets2/images/home-01/brd-04.png" width="199" height="110"
                                    alt=""></figure>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="biolife-brd-container transparent-effect">
                        <a href="#" class="link">
                            <figure><img src="assets2/images/home-01/brd-01.png" width="199" height="110"
                                    alt=""></figure>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="biolife-brd-container transparent-effect">
                        <a href="#" class="link">
                            <figure><img src="assets2/images/home-01/brd-02.png" width="199" height="110"
                                    alt=""></figure>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="biolife-brd-container transparent-effect">
                        <a href="#" class="link">
                            <figure><img src="assets2/images/home-01/brd-03.png" width="199" height="110"
                                    alt=""></figure>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="biolife-brd-container transparent-effect">
                        <a href="#" class="link">
                            <figure><img src="assets2/images/home-01/brd-04.png" width="199" height="110"
                                    alt=""></figure>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection

