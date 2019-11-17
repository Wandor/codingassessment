@extends('app')

@section('content')


<div class="container">
  <header>
    <h2 class="text-center">Trip Details</h2>
  </header>
  <hr>
  <div class="row">
    <div class="col">
      <p>
        <label for="Request Date">Request Date</label><br>
          <i class="fa fa-calendar"></i>
          <span>{{ date("d/m/Y", strtotime($ride->request_date))}}</span><br>
      </p>
      <p>
        <label for="Request Time">Request Time</label><br>
        <i class="fa fa-clock-o"></i>
        <span>{{ date("H:i:s", strtotime($ride->request_date))}}
          <span>Hrs</span>
        </span>
      </p>
    </div>
    <div class="float-left">

      <label>Trip Status</label>
      <br>
      {{ $ride->status}}
      <br>
      <label>Trip Cost</label>
      <br>
      <i class="fa fa-money" aria-hidden="true"></i>
      {{ $ride->cost}}
      <span>{{ $ride->cost_unit}}</span>
      <br>
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="col">
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
    <div class="pull-right">
    <label>Pickup Time</label>
    <br>
      <p>
        <span>
          <i class="fa fa-clock-o"></i>
          {{ date("H:i:s", strtotime($ride->pickup_date))}}
          <span>Hrs</span>
        </span>
      </p>
      <label>Dropoff Time</label>
    <br>
      <p>
        <span>
          <i class="fa fa-clock-o"></i>
          {{ date("H:i:s", strtotime($ride->dropoff_date))}}
          <span>Hrs</span>
        </span>
      </p>
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="col">
      <p>
        <label>Driver's Name</label>
          <br>
          <span>{{ $ride->driver_name}}</span><br>
      </p>
      <p>
      <label>Driver's Picture</label>
          <br>
          <img src="{{ $ride->driver_pic}}" alt=""><br>
      </p>
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
    </div>
    <div class="col">
      <label>Drive Particulars</label>
      <p>
        <b>Distance Covered :</b>
        <span>{{ $ride->distance}}</span>
        <span>{{ $ride->distance_unit}}</span>
      </p>
      &nbsp
      &nbsp
      &nbsp
      <p>
        <b>Trip Duration :</b>
        <span>{{ $ride->duration}}</span>
        <span>{{ $ride->duration_unit}}</span>
      </p>
      &nbsp
      &nbsp
      &nbsp
      <p>
        <b>Total Trip Cost :</b>
        <span>{{ $ride->cost}}</span>
        <span>{{ $ride->cost_unit}}</span>
      </p>
    </div>
    <div class="pull-left">
      <p>
        <label>Car Details</label>
        <br>
        <img src="{{ $ride->car_pic}}" alt=""><br>
        <p>
        <label>Car Make : <span>{{ $ride->car_make}}</span></label>
        </p>
        <p>
        <label>Car Model : <span>{{ $ride->car_model}}</span></label>
        </p>
        <p>
        <label>Car Number : <span>{{ $ride->car_number}}</span></label>
        </p>
      </p>
    </div>



        </div>
        <hr>
        <div id="map_canvas" style="height: 354px; width:768px;" class="container">
      <label> MAP</label>
        </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&callback=initialize"></script> -->
<script>
var directionsDisplay,
    directionsService,
    pointA,
    pointB,
    map;

function initialize() {

  var pointA = new google.maps.LatLng({{$ride->pickup_lat}}, {{$ride->pickup_lng}});
    pointB = new google.maps.LatLng({{$ride->dropoff_lat}}, {{$ride->dropoff_lng}});

  var mapOptions = { zoom:11, mapTypeId: google.maps.MapTypeId.ROADMAP, center: pointA }
 map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions),

 // Instantiate a directions service.
 directionsService = new google.maps.DirectionsService,
    directionsDisplay = new google.maps.DirectionsRenderer({
      map: map
    }),
  markerA = new google.maps.Marker({
      position: pointA,
      title: "Pickup Location",
      label: "Pickup",
      map: map
    }),
    markerB = new google.maps.Marker({
      position: pointB,
      title: "DropOff Location",
      label: "Dropoff",
      map: map
    });
    // get route from A to B
  calculateAndDisplayRoute(directionsService, directionsDisplay, pointA, pointB);

  function calculateAndDisplayRoute(directionsService, directionsDisplay, pointA, pointB) {
  directionsService.route({
    origin: pointA,
    destination: pointB,
    travelMode: google.maps.TravelMode.DRIVING
  }, function(response, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(response);
      pointsArray = response.routes[0].legs[0].steps;
      route = "";
      for (var i in pointsArray) {
        route += "<li>"+pointsArray[i].instructions+"</li>" ;
      }
      document.getElementById("route").innerHTML = "<ul>"+route+"</ul>";
    } else {
      window.alert('Directions request failed due to ' + status);
    }
  });
}


    map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
    directionsDisplay.setMap(map);
}

</script>
</div>


