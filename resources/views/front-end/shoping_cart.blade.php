@extends('front-end.layouts.layout')
@section('title', 'Shoping Cart')
@section('content2')

    <!--Hero Section-->
    <div class="hero-section hero-background">
        <h1 class="page-title">Organic Fruits</h1>
    </div>

    <!--Navigation section-->
    <div class="container">
        <nav class="biolife-nav">
            <ul>
                <li class="nav-item"><a href="index-2.html" class="permal-link">Home</a></li>
                <li class="nav-item"><span class="current-page">ShoppingCart</span></li>
            </ul>
        </nav>
    </div>

    <div class="page-contain shopping-cart">

        <!-- Main content -->
        <div id="main-content" class="main-content">
            <div class="container">

                <!--Cart Table-->
                @livewire('shoping-cart-file')

                <!--Related Product-->
                <div class="product-related-box single-layout">
                    <div class="biolife-title-box lg-margin-bottom-26px-im">
                        <h3 class="main-title">Related Products</h3>
                    </div>
                    <ul class="products-list biolife-carousel nav-center-02 nav-none-on-mobile"
                        data-slick='{"rows":1,"arrows":true,"dots":false,"infinite":false,"speed":400,"slidesMargin":0,"slidesToShow":5, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 4}},{"breakpoint":992, "settings":{ "slidesToShow": 3, "slidesMargin":20}},{"breakpoint":768, "settings":{ "slidesToShow": 2, "slidesMargin":10}}]}'>
                        @foreach ($products as $product)
                            <li class="product-item">
                                <div class="contain-product layout-default">
                                    <div class="product-thumb">
                                        <a href="#" class="link-to-product">
                                            <img src="{{ asset('storage/' . $product->image) }}" alt="dd"
                                                width="270" height="270" class="product-thumnail">
                                        </a>
                                    </div>
                                    <div class="info">
                                        <b class="categories">{{ $product->sub_familie->label }}</b>
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
                                        </div>
                                        <div class="slide-down-box">
                                            <p class="message">{{ $product->description }}</p>
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

            </div>
        </div>
    </div>


@endsection
{{--  --}}
