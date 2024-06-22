
@extends('back-end.html.index')
@section('title', 'Create order')
@section('content')


    <!-- Basic Layout -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Add new order details</h5>
                    <small class="text-muted float-end">order</small>
                </div>
                <div class="card-body">
                    <form action="{{ route('orders_details.store') }}" method="POST"  enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">products</label>
                            <select name="product_id" class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                                @foreach ($products as $product)
                                @if(old('product_id') == $product->id)
                                <option value="{{ $product->id}}" selected>{{ $product->designation }}</option>
                                @else
                                <option value="{{ $product->id}}">{{  $product->designation}}</option>
                                @endif
                                @endforeach
                            </select>
                            @error('product_id')
                                <div class="alert text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">orders</label>
                            <select name="order_id" class="form-select" id="exampleFormControlSelect1"
                                aria-label="Default select example">
                                @foreach ($orders as $order)
                                    @if (old('order_id') == $order->id)
                                        <option value="{{ $order->id }}" selected>{{ $order->date }} :{{ $order->hour }} :id  {{$order->id}} </option>
                                        @else
                                        <option value="{{ $order->id }}">{{ $order->date }} :{{ $order->hour }} :id  {{$order->id}}</option>
                                        @endif
                                @endforeach
                            </select>
                            @error('order_id')
                                <div class="alert text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Quantity</label>
                            <input type="text" value="{{ old('quantity') }}" name="quantity" class="form-control"
                                id="basic-default-fullname" placeholder="quantity" />
                            @error('quantity')
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
                            <label class="form-label" for="basic-default-fullname">VAT</label>
                            <input type="number" value="{{ old('VAT') }}" step="0.1" name="VAT" class="form-control"
                                id="basic-default-fullname" placeholder="12.33" />
                            @error('VAT')
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

