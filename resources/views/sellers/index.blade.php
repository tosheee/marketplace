@extends('layouts.app')

@section('content')
    <div class="col-md-2">
        @include('partials.seller_navigation')
    </div>

    @if (count($ordersIntoSeller) > 0 ) )

        @foreach($ordersIntoSeller as $orders)

        @endforeach
    @else
      no orders
    @endif


@endsection