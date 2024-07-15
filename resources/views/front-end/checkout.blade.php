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

    <div class="page-contain checkout">

        <!-- Main content -->
        <div id="main-content" class="main-content">
            <div class="container sm-margin-top-37px">
                <div class="row">

                    <!--checkout progress box-->
                    <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
                        <div class="checkout-progress-wrap">
                            <ul class="steps">
                                <li class="step 2nd">
                                    <div class="checkout-act @isset($checkout) active @endisset">
                                        <h3 class="title-box"><span class="number">2</span>Shipping</h3>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                        @isset($checkout)
                                            <div class="signin-container ">
                                                <form action="{{ route('shipping') }}" name="frm-login" method="post">
                                                    @csrf
                                                    <p class="form-row">
                                                        <label for="fid-name">Paymanet mode :<span
                                                                class="requite">*</span></label>
                                                        <select name="payment_mode_id" class="country">
                                                            <option value="-1">Select Paymanet mode</option>
                                                            @foreach (App\Models\PaymentMode::all() as $mode)
                                                                @if (old('payment_mode_id') == $mode->id)
                                                                    <option value="{{ $mode->id }}" selected>
                                                                        {{ $mode->payment_mode }}
                                                                    </option>
                                                                @else
                                                                    <option value="{{ $mode->id }}">
                                                                        {{ $mode->payment_mode }}
                                                                    </option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                        @error('payment_mode_id')
                                                        <div class="text-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    </p>
                                                    <p class="form-row">
                                                        <label for="fid-name">Status :<span class="requite">*</span></label>
                                                        <select name="status_id" class="country">
                                                            <option value="-1">Select Paymanet mode</option>
                                                            @foreach (App\Models\Status::all() as $status)
                                                                @if (old('status_id') == $status->id)
                                                                    <option value="{{ $status->id }}" selected>
                                                                        {{ $status->status }}
                                                                    </option>
                                                                @else
                                                                    <option value="{{ $status->id }}">{{ $status->status }}
                                                                    </option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                        @error('status_id')
                                                        <div class="text-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    </p>
                                                    <p class="form-row">
                                                        <label for="fid-name">Shipping address:<span
                                                                class="requite">*</span></label>
                                                        <textarea type="text" id="fid-name" name="shipping_address" class="txt-input">{{ old('shipping_address') }}</textarea>
                                                        @error('shipping_address')
                                                        <div class="text-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    </p>
                                                    <p class="form-row">
                                                        <label for="fid-name">City:<span class="requite">*</span></label>
                                                        <input type="text" id="fid-name" name="city"
                                                            value="{{ old('city') }}" class="txt-input">
                                                        @error('city')
                                                        <div class="text-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    </p>
                                                    <p class="form-row">
                                                        <label for="fid-name">State:<span class="requite">*</span></label>
                                                        <input type="text" id="fid-name" name="state"
                                                            value="{{ old('state') }}" class="txt-input">
                                                        @error('state')
                                                        <div class="text-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    </p>
                                                    <p class="form-row">
                                                        <label for="fid-name">Zip code:<span class="requite">*</span></label>
                                                        <input type="text" id="fid-name" name="zip_code"
                                                            value="{{ old('zip_code') }}" class="txt-input">
                                                        @error('zip_code')
                                                        <div class="text-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    </p>
                                                    <p class="form-row">
                                                        <label for="fid-name">Country:<span class="requite">*</span></label>
                                                        <input type="text" id="fid-name" name="country"
                                                            value="{{ old('country') }}" class="txt-input">
                                                        @error('country')
                                                        <div class="text-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    </p>
                                                    <p class="form-row wrap-btn d-flex">
                                                        <button class="btn btn-submit btn-bold ms-auto"
                                                            type="submit">Save</button>
                                                    </p>
                                                </form>
                                            </div>
                                        @endisset
                                    </div>
                                </li>
                                <li class="step 3rd">
                                    <div class="checkout-act">
                                        <h3 class="title-box"><span class="number">3</span>Billing</h3>
                                    </div>
                                </li>
                                <li class="step 4th">
                                    <div class="checkout-act">
                                        <h3 class="title-box"><span class="number">4</span>Payment</h3>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!--Order Summary-->
                    <div
                        class="col-lg-5 col-md-5 col-sm-6 col-xs-12 sm-padding-top-48px sm-margin-bottom-0 xs-margin-bottom-15px">
                        <div class="order-summary sm-margin-bottom-80px">
                            <div class="title-block">
                                <h3 class="title">Order Summary</h3>
                                <a href="{{ route('shopingCart') }}" class="link-forward">Edit cart</a>
                            </div>
                            <div class="cart-list-box short-type">
                                <span class="number">{{ $cartContentGeneral['nbItemCart'] }}items</span>
                                <ul class="cart-list">
                                    @foreach ($cartContent as $cart)
                                        <li class="cart-elem">
                                            <div class="cart-item">
                                                <div class="product-thumb">
                                                    <a class="prd-thumb" href="#">
                                                        <figure><img src="{{ asset('storage/' . $cart['image']) }}"
                                                                width="113" height="113" alt="shop-cart"></figure>
                                                    </a>
                                                </div>
                                                <div class="info">
                                                    <span class="txt-quantity">{{ $cart['qty'] }}X</span>
                                                    <a href="#" class="pr-name">{{ $cart['name'] }}</a>
                                                </div>
                                                <div class="price price-contain">
                                                    @if ($cart['new_price_ht'])
                                                        <ins><span class="price-amount"><span
                                                                    class="currencySymbol">Mad</span>
                                                                {{ $cart['new_price_ht'] }}</span></ins>
                                                        <del><span class="price-amount"><span
                                                                    class="currencySymbol">Mad</span>
                                                                {{ $cart['price'] }}</span></del>
                                                    @else
                                                        <ins><span class="price-amount"><span
                                                                    class="currencySymbol">Mad</span>
                                                                {{ $cart['price'] }}</span></ins>
                                                    @endif
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                                <ul class="subtotal">
                                    <li>
                                        <div class="subtotal-line">
                                            <b class="stt-name">Subtotal</b>
                                            <span class="stt-price">Mad {{ $cartContentGeneral['total'] }}</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="subtotal-line">
                                            <b class="stt-name">Shipping</b>
                                            <span class="stt-price">£20.00</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="subtotal-line">
                                            <b class="stt-name">Tax</b>
                                            <span class="stt-price">£0.00</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="subtotal-line">
                                            <a href="#" class="link-forward">Promo/Gift Certificate</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="subtotal-line">
                                            <b class="stt-name">total:</b>
                                            <span class="stt-price">Mad {{ $cartContentGeneral['total'] + 20 }}</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection
