@extends('app')

@section('content')

@foreach($rides as $ride)

<div class = "container">
<a href="{{ url('/result/'.$ride['id']) }}">
<div class="card text-center">
    <div class ="panel panel-primary">
    <div class="card-body">
    <h5 class="card-title text-center">{{ $ride['pickup_date'] }}</h5>
    <span class= "float-left">{{ $ride['cost'] }}</span>


    <p>{{ $ride['pickup_location'] }}</p>
    <p>{{ $ride['dropoff_location'] }}</p>

    {{ $ride['driver_rating'] }}
    <div class="card-footer">{{ $ride['status'] }}</div>
    </div>

    </div>

</div>
</a>
</div>



@endforeach

    <div class="container">
        {!! $rides->links() !!}
    </div>

@stop
