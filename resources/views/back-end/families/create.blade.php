@extends('back-end.html.index')
@section('title','Create famile')
@section('content')


              <!-- Basic Layout -->
              <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Add new famile</h5>
                      <small class="text-muted float-end">Default label</small>
                    </div>
                    <div class="card-body">
                      <form action="{{route('families.store')}}" method="POST"  enctype="multipart/form-data" >
                        @csrf

                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">famile</label>
                          <input type="text" value="{{old('label')}}" name="label" class="form-control" id="basic-default-fullname" placeholder="Shopify" />
                          @error('label')
                          <div class="alert text-danger">
                            {{$message}}
                        </div>
                        @enderror
                        </div>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" value="{{old('image')}}" name="image" id="inputGroupFile02" />
                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
                            @error('image')
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
