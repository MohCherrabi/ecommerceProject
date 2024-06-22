



  @extends('back-end.html.index')
@section('title', 'sub products')
@section('content')
    <a name="submitButton" href="{{ route('sub_products.create') }}" class="btn btn-primary ms-auto mb-3" style="width:auto;">+Add
        product</a>
    <div class="card">
        <h5 class="card-header d-inline" style="display: inline;">All sub products</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Bar code</th>
                        <th>Designation</th>
                        <th>Price HT</th>
                        <th>New Price HT</th>
                        <th>VAT</th>
                        <th>Description</th>
                        <th>Sub familie</th>
                        <th>Unit</th>
                        <th>Brand</th>
                        <th>product</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($sub_products as $product)
                        <tr>
                            <td>
                                <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                        class="avatar avatar-xs pull-up" title="Lilian Fuller">
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="Avatar"
                                            style="width: 30px !important;height:30px;" width="20px"
                                            class="rounded-circle" />
                                    </li>
                                </ul>
                            <td>
                                {{ $product->barcode }}
                            </td>
                            <td>
                                {{ $product->designation }}
                            </td>
                            <td>
                                {{ $product->price_ht }}
                            </td>
                            <td>
                                @if(isset($product->new_price_ht))
                                {{ $product->new_price_ht }}
                                @else
                                -----
                                @endif
                            </td>
                            <td>
                                {{ $product->VAT }}
                            </td>
                            <td>
                                {{ $product->description }}
                            </td>
                            <td>
                                {{ $product->sub_familie->label }}
                            </td>
                            <td>
                                {{ $product->unit->unit }}
                            </td>
                            <td>
                                {{ $product->brand->brand }}
                            </td>
                            <td>
                                {{ $product->product->designation }}
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <button type="button" class="btn ">
                                            <a class="dropdown-item" href="{{ route('sub_products.edit', $product->id) }}"><i
                                                    class="bx bx-edit-alt me-1"></i> Edit</a></button>

                                        <form class="dropdown-item" action="{{ route('sub_products.destroy', $product->id) }}"
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
                {{ $sub_products->links() }}
            </div>
        </div>
    </div>
@endsection
