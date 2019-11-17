@extends('app')

@section('content')

<header>
    <h2 class="text-center">Search Results</h2>
  </header>
  <hr>
  
@foreach($rides as $ride)
@if($loop->count>1)


<a style= "text-decoration: none;" href="{{ url('/result/'.$ride['id']) }}">
    <div class="container">
    
        <h3>Results found : <span>{{$loop->count}}</span> </h3> 
        <div class="panel panel-primary" >
            <div class="panel-body">
                <div class="row">
                    <div class="col">
                        <label>Pickup Date</label>
                            <br>
                            <p class="text-left">
                                <span>
                                    <i class="fa fa-calendar"></i>
                                    <span>{{ date("d/m/Y", strtotime($ride->pickup_date))}}</span><br>
                                    <i class="fa fa-clock-o"></i>
                                    <span>{{ date("H:i:s", strtotime($ride->pickup_date))}} </span>
                                    <span>Hrs</span>
                                </span>
                            </p>
                            <label>Pickup Location</label>
                                <br>
                                <p>
                                    <span>
                                    <i class="fa fa-map-marker"></i>{{ $ride->pickup_location }}
                                    </span>
                                </p>
                                <label>Dropoff Location</label>
                                <br>
                                <p>
                                    <span>
                                    <i class="fa fa-map-marker"></i>{{ $ride->dropoff_location }}
                                    </span>
                                </p>
                    </div>
                    <div class="pull-left" style="margin-right:15px;">
      
                        
                        <label>Trip Cost</label>
                        <br>
                        <i class="fa fa-money" aria-hidden="true"></i>
                        {{ $ride->cost}}
                        <span>{{ $ride->cost_unit}}</span>
                        <br>
                        <p>
                            @php $rating =  $ride->driver_rating; @endphp 
                            <label>Driver's Rating</label>
                                <br>
                                @while($rating>0)
                                        @if($rating >0.5)
                                            <i class="fa fa-star"></i>
                                        @else
                                            <i class="fa fa-star-half"></i>
                                        @endif
                                        @php $rating--; @endphp
                                    @endwhile
                        </p>
                        <label>Trip Status</label>
      <br>
      {{ $ride->status}}
      <br>
                    </div>
            </div>
            
            </div>
        </div>
                
    </div>
</a>

@endif
@endforeach

