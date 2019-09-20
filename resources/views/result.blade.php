@extends('app')

@section('content')
@foreach ($students as $key=> $student)
<div>
<a href="{{ URL::route('result', ['id' => $ride->id]) }}">{{$ride->name}}</a>
</div>              
@endforeach