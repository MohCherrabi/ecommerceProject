@extends('back-end.html.index')
@section('title','sub_families')
@section('content')
<a name="submitButton" href="{{route('sub_families.create')}}" class="btn btn-primary ms-auto mb-3" style="width:auto;">+Add familie</a>
<div class="card">
    <h5 class="card-header d-inline" style="display: inline;">All Sub families</h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr>
            <th>Image</th>
            <th>Familie</th>
            <th>Label</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @foreach($sub_families as $sub_familie)
          <tr>
            <td>
                <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                  <li
                    data-bs-toggle="tooltip"
                    data-popup="tooltip-custom"
                    data-bs-placement="top"
                    class="avatar avatar-xs pull-up"
                    title="Lilian Fuller">
                    <img src="{{asset('storage/'.$sub_familie->image)}}" alt="Avatar" style="width: 30px !important;height:30px;" width="20px" class="rounded-circle" />
                  </li>
                </ul>
            <td>
            {{$sub_familie->familie->label}}
            </td>
            <td>
                {{$sub_familie->label}}
            </td>
            <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                    <button type="button" class="btn ">
                  <a class="dropdown-item" href="{{route('sub_families.edit',$sub_familie->id)}}"
                    ><i class="bx bx-edit-alt me-1"></i> Edit</a
                  ></button>

                  <form  class="dropdown-item" action="{{ route('sub_families.destroy', $sub_familie->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet élément en cours ?');"
                    class="btn ">
                    <i class="bx bx-trash me-1"></i> Delete <!-- Icon for delete -->
                    </button>
                </form>
                </div>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div class="d-flex justify-content-center">
        {{ $sub_families->links() }}
    </div>
    </div>
  </div>
  @endsection
