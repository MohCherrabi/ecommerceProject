@extends('front-end.layouts.layoutAuth')
@section('contentAuth')



<div class="container">
    <nav class="biolife-nav">
        <ul>
            <li class="nav-item"><a href="{{route('home')}}" class="permal-link">Home</a></li>
            <li class="nav-item"><a href="{{route('loginForm')}}" class="current-page">Register</a></li>
        </ul>
    </nav>
</div>

<div class="page-contain login-page ">

    <!-- Main content -->
    <div id="main-content" class="main-content ">
        <div class="container ">

            <div class="row" style="display: flex !important; justify-content: center !important;">

                <!--Form Sign In-->
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                    <div class="signin-container">
                        <form action="{{route('register')}}" name="frm-login" method="post">
                            @csrf
                            <p class="form-row">
                                <label for="fid-name">First name:<span class="requite">*</span></label>
                                <input type="text" id="fid-name" name="first_name" value="{{old('first_name')}}" class="txt-input">
                                @error('first_name')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </p>
                            <p class="form-row">
                                <label for="fid-name">Last name:<span class="requite">*</span></label>
                                <input type="text" id="fid-name" name="last_name" value="{{old('last_name')}}" class="txt-input">
                                @error('last_name')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </p>
                            <p class="form-row">
                                <label for="fid-name"> Address:<span class="requite">*</span></label>
                                <input type="text" id="fid-name" name="address" value="{{old('address')}}" class="txt-input">
                                @error('address')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </p>
                            <p class="form-row">
                                <label for="fid-name">City:<span class="requite">*</span></label>
                                <input type="text" id="fid-name" name="city" value="{{old('city')}}" class="txt-input">
                                @error('city')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </p>
                            <p class="form-row">
                                <label for="fid-name">Phone number:<span class="requite">*</span></label>
                                <input type="text" id="fid-name" name="tel" value="{{old('tel')}}" class="txt-input">
                                @error('tel')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </p>
                            <p class="form-row">
                                <label for="fid-name">Email Address:<span class="requite">*</span></label>
                                <input type="text" id="fid-name" name="email" value="{{old('email')}}" class="txt-input">
                                @error('email')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </p>
                            <p class="form-row">
                                <label for="fid-pass">Password:<span class="requite">*</span></label>
                                <input type="password" id="fid-pass" name="password" value="" class="txt-input">
                            </p>
                            <p class="form-row wrap-btn">
                                <button class="btn btn-submit btn-bold" type="submit">Register</button>
                                already have account<a href="{{route('loginForm')}}" class="link-to-help">login</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>



@endsection
{{--  --}}
