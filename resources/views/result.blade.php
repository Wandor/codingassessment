@extends('app')

@section('content')
          
@foreach($newrides as $ride)
    <div class = "container">
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
        </div>
        </a>
        
    <!-- {{json_encode($ride)}} -->
    </div>
    
    
@endforeach

<!-- @extends('app')

@section('content')
          
@foreach($newrides as $ride)
    <div class = "container">
        <div>
        
    
        </div>
    {{json_encode($ride)}}
    </div>
    
    
@endforeach -->