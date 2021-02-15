@extends('layouts.app')

@section('content')
<div class="container">

    @if (empty($items))
    {{ __("Cart is empty.")}}
    @else
    <form action="{{ route('cart.updates') }}" method="post">
        @csrf
        @include('cart.components.index_nav')
        @include('cart.components.index_item_list')
    </form>
    @endif

    if (isset($items))
    @include('cart.components.index_control')
    @endif

</div>
  <!-- <div class="container">
    <a href="{{ route('cart.clear') }}" class="btn btn-danger">{{ __("Clear All") }}</a>

    <table class="table">

        @if (isset($items))
        <button class="btn btn-outline-primary">{{ __("Update") }}</button>
        <a href="{{ route('cart.clear') }}" class="btn btn-danger">{{ __("Clear All") }}</a>
        @else
        <div class="alert alert-info">
            {{ __("Cart is empty.") }}
        </div>
        @endif

        <tr>
            <th></th>
            <th>{{ __("Item Name") }}</th>
            <th>{{ __("Price") }}</th>
            <th>{{ __("Amount") }}</th>
            <th></th>
        </tr>
        @if (isset($items))
        @foreach ($items as $item)
        <tr>
            <td><img src="{{ asset('images/now_printing.jpg') }}" width="50"></td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->price }}</td>
            <td>
                <input type="number" value="{{ $user_items[$item->id]->amount }}" class="form-control col-3 text-right">
            </td>

            <td>
                <a href="{{ route('cart.remove', ['id' => $item->id]) }}" class="btn btn-sm btn-danger">{{ __('Delete') }}</a>
            </td>
        </tr>
        @endforeach
    @endif
    </table>

    <div>
        <label for="">{{ __("Total Price：") }}</label>
        {{ $total_price }}
    </div>

    <div>
        <p>
            <a href="{{ route('cart.confirm') }}" class="btn btn-outline-primary">{{ __("Next") }}</a>
        </p>
    </div>

</div> -->
@endsection