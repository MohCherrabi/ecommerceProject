
@extends('back-end.html.index')
@section('title', 'Create order')
@section('content')


    <!-- Basic Layout -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Add new order</h5>
                    <small class="text-muted float-end">order</small>
                </div>
                <div class="card-body">
                    <form action="{{ route('orders.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="html5-date-input" class="col-md-2 col-form-label">Date</label>
                            <div class="">
                                <input class="form-control" type="date" value="{{ old('date') }}" name="date"
                                    id="html5-date-input" />
                                @error('date')
                                    <div class="alert text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="html5-time-input" class="col-md-2 col-form-label">Time</label>
                            <div class="">
                                <input class="form-control" type="time" value="{{ old('hour') }}" name="hour"
                                    id="html5-time-input" />
                                @error('hour')
                                    <div class="alert text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">payment</label>

                            <div class="form-check mt-3">
                                <input name="payment" class="form-check-input" type="radio" value="1" @if( old('payment') == 1) checked=''@endif
                                    id="defaultRadio1">
                                <label class="form-check-label" for="defaultRadio1"> Yes </label>
                            </div>
                            <div class="form-check mt-3">
                                <input name="payment" class="form-check-input" type="radio" value="0"  @if( old('payment') ==0) checked=''@endif
                                    id="defaultRadio1">
                                <label class="form-check-label" for="defaultRadio1"> No </label>
                            </div>
                            @error('payment')
                                <div class="alert text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">payment mode</label>
                            <select name="payment_mode_id" class="form-select" id="exampleFormControlSelect1"
                                aria-label="Default select example">
                                @foreach ($payment_modes as $payment_mode)
                                    @if (old('payment_mode_id') == $payment_mode->id)
                                        <option value="{{ $payment_mode->id }}" selected>{{ $payment_mode->payment_mode }}
                                        </option>
                                        @else
                                        <option value="{{ $payment_mode->id }}">{{ $payment_mode->payment_mode }}</option>
                                        @endif
                                @endforeach
                            </select>
                            @error('payment_mode_id')
                                <div class="alert text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">Statuse</label>
                            <select name="status_id" class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                                @foreach ($statuses as $status)
                                @if(old('status_id') == $status->id)
                                <option value="{{ $status->id}}" selected>{{ $status->status }}</option>
                                @else
                                <option value="{{ $status->id}}">{{  $status->status}}</option>
                                @endif
                                @endforeach
                            </select>
                            @error('status_id')
                                <div class="alert text-danger">
                                    {{ $message }}
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
                        </div>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection

