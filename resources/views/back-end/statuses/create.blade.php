@extends('back-end.html.index')
@section('title','Create status')
@section('content')


              <!-- Basic Layout -->
              <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Add new status</h5>
                      <small class="text-muted float-end">Default label</small>
                    </div>
                    <div class="card-body">
                      <form action="{{route('statuses.store')}}" method="POST" >
                        @csrf

                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">status</label>
                          <input type="text" value="{{old('status')}}" name="status" class="form-control" id="basic-default-fullname" placeholder="Shopify" />
                          @error('status')
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
