@extends('app')

@section('content')


<div class="container">
    <div>
        <p>{{ $ride->pickup_date }}</p>
        <p>{{ $ride->request_date}}</p>
        <p>{{ $ride->cost}}</p>
        <p>{{ $ride->driver_rating}}</p>

    </div>
    <br>
    <div></div>
    <br>
    <div></div>
</div>

