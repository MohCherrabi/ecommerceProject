@extends('back-end.html.index')
@section('title','Create comment')
@section('content')


              <!-- Basic Layout -->
              <div class="row">
                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Add new comment</h5>
                      <small class="text-muted float-end">Default label</small>
                    </div>
                    <div class="card-body">
                      <form action="{{route('comments.store')}}" method="POST"  enctype="multipart/form-data" >
                        @csrf

                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Description</label>
                            <textarea class="form-control" name="description" aria-label="With textarea" style="height: 24px;">{{old('description')}}</textarea>
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
                                    @if (old('user_id') == $user->id)
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

                            <div class="mb-3">
                                <label for="exampleFormControlSelect1" class="form-label">Blog</label>
                                <select name="blog_id" class="form-select" id="exampleFormControlSelect1"
                                    aria-label="Default select example">
                                    @foreach ($blogs as $blog)
                                        @if (old('blog_id') == $blog->id)
                                            <option value="{{ $blog->id }}" selected>{{ $blog->title }}</option>
                                            @else
                                            <option value="{{ $blog->id }}">{{ $blog->title }}</option>
                                            @endif
                                    @endforeach
                                </select>
                                @error('blog_id')
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
