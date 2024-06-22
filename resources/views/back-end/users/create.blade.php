@extends('back-end.html.index')
@section('title','Create user')
@section('content')

              <!-- Basic Layout -->
              <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Add new user</h5>
                      <small class="text-muted float-end">Default label</small>
                    </div>
                    <div class="card-body">
                      <form action="{{route('users.store')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">First name</label>
                          <input type="text" value="{{old('first_name')}}" name="first_name" class="form-control" id="basic-default-fullname" placeholder="john" />
                          @error('first_name')
                          <div class="alert text-danger">
                            {{$message}}
                        </div>
                        @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Last name</label>
                            <input type="text" value="{{old('last_name')}}" name="last_name" class="form-control" id="basic-default-fullname" placeholder="doe" />
                            @error('last_name')
                            <div class="alert text-danger">
                              {{$message}}
                          </div>
                          @enderror
                          </div>
                          <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Address</label>
                            <input type="text" value="{{old('address')}}" name="address" class="form-control" id="basic-default-fullname" placeholder="address" />
                            @error('address')
                            <div class="alert text-danger">
                              {{$message}}
                          </div>
                          @enderror
                          </div>
                          <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">City</label>
                            <input type="text" value="{{old('city')}}" name="city" class="form-control" id="basic-default-fullname" placeholder="fes" />
                            @error('city')
                            <div class="alert text-danger">
                              {{$message}}
                          </div>
                          @enderror
                          </div>
                          <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Email</label>
                            <input type="email" value="{{old('email')}}" name="email" class="form-control" id="basic-default-fullname" placeholder="johndoe@gmail.com" />
                            @error('email')
                            <div class="alert text-danger">
                              {{$message}}
                          </div>
                          @enderror
                          </div>

                          <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Telphone</label>
                            <input type="text" value="{{old('tel')}}" name="tel" class="form-control" id="basic-default-fullname" placeholder="060000000" />
                            @error('tel')
                            <div class="alert text-danger">
                              {{$message}}
                          </div>
                          @enderror
                          </div>

                          <div class="form-password-toggle mb-3">
                            <label class="form-label" for="basic-default-password12">Password</label>
                            <div class="input-group">
                              <input
                                type="password"
                                name="password"
                                class="form-control"
                                id="basic-default-password12"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                aria-describedby="basic-default-password2" />
                              <span id="basic-default-password2" class="input-group-text cursor-pointer"
                                ><i class="bx bx-hide"></i
                              ></span>
                            </div>
                            @error('password')
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
