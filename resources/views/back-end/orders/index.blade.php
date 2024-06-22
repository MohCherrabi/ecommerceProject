@extends('back-end.html.index')
@section('title','orders')
@section('content')
<a name="submitButton" href="{{route('orders.create')}}" class="btn btn-primary ms-auto mb-3" style="width:auto;">+Add familie</a>
<div class="card">
    <h5 class="card-header d-inline" style="display: inline;">All Sub families</h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr>
            <th>Date</th>
            <th>Hour</th>
            <th>Payment</th>
            <th>Pyment Mode</th>
            <th>Status</th>
            <th>User</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @foreach($orders as $order)
          <tr>
            <td>
                {{$order->date}}
            </td>
            <td>
                {{$order->hour}}
            </td>
            <td>
                @if($order->payment == 1)
                Yes
                @else
                No
                @endif
            </td>
            <td>
               {{$order->payment_mode->payment_mode}}
            </td>
            <td>
                {{$order->status->status}}
             </td>
             <td>
                {{$order->user->first_name}}
             </td>
            <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                    <button type="button" class="btn ">
                  <a class="dropdown-item" href="{{route('orders.edit',$order->id)}}"
                    ><i class="bx bx-edit-alt me-1"></i> Edit</a
                  ></button>

                  <form  class="dropdown-item" action="{{ route('orders.destroy', $order->id) }}" method="POST">
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
        {{ $orders->links() }}
    </div>
    </div>
  </div>
  @endsection
