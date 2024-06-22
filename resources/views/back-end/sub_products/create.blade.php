
@extends('back-end.html.index')
@section('title', 'Create sub product')
@section('content')


    <!-- Basic Layout -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Add new product</h5>
                    <small class="text-muted float-end">sub product</small>
                </div>
                <div class="card-body">
                    <form action="{{ route('sub_products.store') }}" method="POST"  enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Bar code</label>
                            <input type="number" value="{{ old('barcode') }}" name="barcode" class="form-control"
                                id="basic-default-fullname" placeholder="sous Familie" />
                            @error('barcode')
                                <div class="alert text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">desgnation</label>
                            <input type="text" value="{{ old('designation') }}" name="designation" class="form-control"
                                id="basic-default-fullname" placeholder="desgnation" />
                            @error('designation')
                                <div class="alert text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">price</label>
                            <input type="number" value="{{ old('price_ht') }}" step="0.1" name="price_ht" class="form-control"
                                id="basic-default-fullname" placeholder="12.33" />
                            @error('price_ht')
                                <div class="alert text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">New price</label>
                            <input type="number" value="{{ old('new_price_ht') }}" step="0.1" name="new_price_ht" class="form-control"
                                id="basic-default-fullname" placeholder="12.33" />
                            @error('new_price_ht')
                                <div class="alert text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">VAT</label>
                            <input type="number" value="{{ old('VAT') }}" step="0.1" name="VAT" class="form-control"
                                id="basic-default-fullname" placeholder="12.33" />
                            @error('VAT')
                                <div class="alert text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">description</label>
                            <input type="text" value="{{ old('description') }}" step="0.1" name="description" class="form-control"
                                id="basic-default-fullname" placeholder="description" />
                            @error('description')
                                <div class="alert text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class=" mb-3">
                            <label class="form-label">image</label>
                            <div class="input-group">
                            <input type="file" class="form-control"  value="{{old('image')}}" name="image" id="inputGroupFile02" />
                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
                        </div>
                            @error('image')
                            <div class="alert text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">Sub familie</label>
                            <select name="sub_familie_id" class="form-select" id="exampleFormControlSelect1"
                                aria-label="Default select example">
                                @foreach ($sub_families as $sub_familie)
                                    @if (old('sub_familie_id') == $sub_familie->id)
                                        <option value="{{ $sub_familie->id }}" selected>{{ $sub_familie->label }}
                                        </option>
                                        @else
                                        <option value="{{ $sub_familie->id }}">{{ $sub_familie->label }}</option>
                                        @endif
                                @endforeach
                            </select>
                            @error('sub_familie_id')
                                <div class="alert text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">brands</label>
                            <select name="brand_id" class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                                @foreach ($brands as $brand)
                                @if(old('brand_id') == $brand->id)
                                <option value="{{ $brand->id}}" selected>{{ $brand->brand }}</option>
                                @else
                                <option value="{{ $brand->id}}">{{  $brand->brand}}</option>
                                @endif
                                @endforeach
                            </select>
                            @error('brand_id')
                                <div class="alert text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">units</label>
                            <select name="unit_id" class="form-select" id="exampleFormControlSelect1"
                                aria-label="Default select example">
                                @foreach ($units as $unit)
                                    @if (old('unit_id') == $unit->id)
                                        <option value="{{ $unit->id }}" selected>{{ $unit->unit }}</option>
                                        @else
                                        <option value="{{ $unit->id }}">{{ $unit->unit }}</option>
                                        @endif
                                @endforeach
                            </select>
                            @error('unit_id')
                                <div class="alert text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">products</label>
                            <select name="product_id" class="form-select" id="exampleFormControlSelect1"
                                aria-label="Default select example">
                                @foreach ($products as $product)
                                    @if (old('product_id') == $product->id)
                                        <option value="{{ $product->id }}" selected>{{ $product->designation }}</option>
                                        @else
                                        <option value="{{ $product->id }}">{{ $product->designation }}</option>
                                        @endif
                                @endforeach
                            </select>
                            @error('product_id')
                                <div class="alert text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>



                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection

