@extends('back-end.html.index')
@section('title', 'orders_details')
@section('content')
    <a name="submitButton" href="{{ route('orders_details.create') }}" class="btn btn-primary ms-auto mb-3" style="width:auto;">+Add
        order_details</a>
    <div class="card">
        <h5 class="card-header d-inline" style="display: inline;">All orders_details</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>Order</th>
                        <th>Product</th>
                        <th>Customer</th>
                        <th>Quantity</th>
                        <th>Price HT</th>
                        <th>VAT</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($orders_details as $order_details)
                        <tr>
                            <td>
                                Id : {{ $order_details->order->id }} Date: {{ $order_details->order->date }} Hour:
                                {{ $order_details->order->hour }}
                            </td>

                            <td>
                                {{ $order_details->product->designation }}
                            </td>
                            <td>
                                {{ $order_details->order->user->first_name}}
                            </td>
                            <td>
                                {{ $order_details->quantity }}
                            </td>
                            <td>
                                {{ $order_details->price_ht }}
                            </td>
                            <td>
                                {{ $order_details->VAT }}
                            </td>

                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <button type="button" class="btn ">
                                            <a class="dropdown-item"
                                                href="{{ route('orders_details.edit', $order_details->id) }}"><i
                                                    class="bx bx-edit-alt me-1"></i> Edit</a></button>

                                        <form class="dropdown-item"
                                            action="{{ route('orders_details.destroy', $order_details->id) }}"
                                            method="POST">
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
                {{ $orders_details->links() }}
            </div>
        </div>
    </div>
@endsection
