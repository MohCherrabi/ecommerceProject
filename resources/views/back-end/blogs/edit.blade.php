@extends('back-end.html.index')
@section('title','Edit blog')
@section('content')


              <!-- Basic Layout -->
              <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Edit blog</h5>
                      <small class="text-muted float-end">Default label</small>
                    </div>
                    <div class="card-body">
                      <form action="{{route('blogs.update',$blog->id)}}" enctype="multipart/form-data" method="POST" >
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Title</label>
                            <input type="text" value="{{$blog->title}}" name="title" class="form-control" id="basic-default-fullname" placeholder="" />
                            @error('title')
                            <div class="alert text-danger">
                              {{$message}}
                          </div>
                          @enderror
                          </div>

                          <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Descripton</label>
                            <input type="text" value="{{$blog->description}}" name="description" class="form-control" id="basic-default-fullname" placeholder="" />
                            @error('description')
                            <div class="alert text-danger">
                              {{$message}}
                          </div>
                          @enderror
                          </div>


                          <div class="mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">User</label>
                            <select name="user_id" class="form-select" id="exampleFormControlSelect1"
                                aria-label="Default select example">
                                @foreach ($users as $user)
                                    @if ($blog->user_id == $user->id)
                                        <option value="{{ $user->id }}" selected>{{ $user->first_name }}</option>
                                        @else
                                        <option value="{{ $user->id }}">{{ $user->first_name }}</option>
                                        @endif
                                @endforeach
                            </select>
                            @error('user_id')
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
                                    @if ($blog->sub_familie_id == $sub_familie->id)
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

                          <div class="input-group mb-3">
                              <input type="file" class="form-control" value="{{$blog->image}}" name="image" id="inputGroupFile02" />
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
