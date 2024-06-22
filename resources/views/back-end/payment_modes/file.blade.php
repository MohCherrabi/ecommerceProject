@extends('back-end.html.index')
@section('title','Edit payment_mode')
@section('content')


              <!-- Basic Layout -->
              <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Edit payment mode</h5>
                      <small class="text-muted float-end">Default label</small>
                    </div>
                    <div class="card-body">
                      <form action="{{route('payment_modes.update',$payment_mode->id)}}" method="POST" >
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">payment_mode</label>
                          <input type="text" value="{{$payment_mode->payment_mode}}" name="payment_mode" class="form-control" id="basic-default-fullname" placeholder="Shopify" />
                          @error('payment_mode')
                          <div class="alert text-danger">
                            {{$message}}
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
