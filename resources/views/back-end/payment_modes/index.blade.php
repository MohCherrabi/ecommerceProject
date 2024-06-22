@extends('back-end.html.index')
@section('title','payment_modes')
@section('content')
<a name="submitButton" href="{{route('payment_modes.create')}}" class="btn btn-primary ms-auto mb-3" style="width:auto;">+Add payment mode</a>
<div class="card">
    <h5 class="card-header d-inline" style="display: inline;">All payment modes</h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr>
            <th>payment modes</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @foreach($payment_modes as $payment_mode)
          <tr>
            <td>
            {{$payment_mode->payment_mode}}
            </td>
            <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                    <button type="button" class="btn ">
                  <a class="dropdown-item" href="{{route('payment_modes.edit',$payment_mode->id)}}"
                    ><i class="bx bx-edit-alt me-1"></i> Edit</a
                  ></button>

                  <form  class="dropdown-item" action="{{ route('payment_modes.destroy', $payment_mode->id) }}" method="POST">
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
        {{ $payment_modes->links() }}
    </div>
    </div>
  </div>
  @endsection
