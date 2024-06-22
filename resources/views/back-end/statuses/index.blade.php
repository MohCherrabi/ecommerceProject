@extends('back-end.html.index')
@section('title','statuses')
@section('content')
<a name="submitButton" href="{{route('statuses.create')}}" class="btn btn-primary ms-auto mb-3" style="width:auto;">+Add status</a>
<div class="card">
    <h5 class="card-header d-inline" style="display: inline;">All statuses</h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr>
            <th>Statuses</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @foreach($statuses as $status)
          <tr>
            <td>
            {{$status->status}}
            </td>
            <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                    <button type="button" class="btn ">
                  <a class="dropdown-item" href="{{route('statuses.edit',$status->id)}}"
                    ><i class="bx bx-edit-alt me-1"></i> Edit</a
                  ></button>

                  <form  class="dropdown-item" action="{{ route('statuses.destroy', $status->id) }}" method="POST">
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
        {{ $statuses->links() }}
    </div>
    </div>
  </div>
  @endsection
