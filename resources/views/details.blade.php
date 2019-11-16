@extends('app')

@section('content')

@foreach($rides as $ride)
<div class="container">
    <div>
    {{ $ride->pickup_date }}
    <!-- {{ $ride->request_date}} -->
    </div>
    <br>
    <div></div>
    <br>
    <div></div>
<!-- {{$ride}} -->
</div>
@endforeach

