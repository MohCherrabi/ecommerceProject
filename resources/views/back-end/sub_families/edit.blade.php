@extends('back-end.html.index')
@section('title', 'Create sub_familie')
@section('content')
    <!-- Basic Layout -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Add new sub_familie</h5>
                    <small class="text-muted float-end">Default label</small>
                </div>
                <div class="card-body">
                    <form action="{{ route('sub_families.update',$sub_familie->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Label</label>
                            <input type="text" value="{{$sub_familie->label }}" name="label" class="form-control"
                                id="basic-default-fullname" placeholder="sub familie label" />
                            @error('label')
                                <div class="alert text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">families</label>
                            <select name="familie_id" class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                                @foreach ($families as $familie)
                                @if($sub_familie->familie_id == $familie->id)
                                <option selected>{{ $familie->id }}</option>
                                @else
                                <option>{{ $familie }}</option>
                                @endif
                                @endforeach
                            </select>
                            @error('familie_id')
                                <div class="alert text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" value="{{$sub_familie->image}}" name="image" id="inputGroupFile02" />
                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
                            @error('image')
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
