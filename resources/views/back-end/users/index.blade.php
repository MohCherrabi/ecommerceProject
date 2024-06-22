@extends('back-end.html.index')
@section('title','users')
@section('content')
<a name="submitButton" href="{{route('users.create')}}" class="btn btn-primary ms-auto mb-3" style="width:auto;"">+Add user</a>
<div class="card">
    <h5 class="card-header d-inline" style="display: inline;">All Users</h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr>
            <th>First name</th>
            <th>Last name</th>
            <th>Address</th>
            <th>City</th>
            <th>Email</th>
            <th>Telephone</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @foreach($users as $user)
          <tr>
            <td>{{$user->first_name}} </td>
            <td>{{$user->last_name}} </td>
            <td>{{$user->address}} </td>
            <td>{{$user->city}} </td>
            <td>{{$user->email}} </td>
            <td>{{$user->tel}} </td>
            <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                    <button type="button" class="btn ">
                  <a class="dropdown-item" href="{{route('users.edit',$user->id)}}"
                    ><i class="bx bx-edit-alt me-1"></i> Edit</a
                  ></button>

                  <form  class="dropdown-item" action="{{ route('users.destroy', $user->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet élément en cours ?');"
                    class="btn">
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
        {{ $users->links() }}
    </div>
    </div>
  </div>
  @endsection
