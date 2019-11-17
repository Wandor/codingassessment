<!-- resources/views/search.blade.php -->

@extends('app')

@section('content')

    <!-- Bootstrap Boilerplate... -->
    
    <div class="panel-body">
        <h1 class ="text-center">Search Ride</h1>
        <form method="post" action="{{action('RideController@search')}}">
        {{csrf_field()}}
        <div>
            <div class="input-group">
                <input type="text" class="form-control" name="keyword" placeholder="Search ride by keyword" > 
                    <span class="input-group-btn">
                        <a href="{{action('RideController@search')}}">
                            <button type="submit" class="btn btn-default">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </a>                        
                    </span>
            </div>
            <div class="text-center">
                <label for="checkbox" style="word-wrap">Include Cancelled Trips</label>
                    <input  name="cancelled" type="checkbox" value="cancelled" checked>
            </div>
            <div class="container">
            <div class="row">
            <div class="col-xs-6">
                <label for="checkbox">Distance</label>
                <div>
                    <input type="radio" name="distance" value="1"> Any<br>
                    <input type="radio" name="distance" value="3"> Under 3KM<br>     
                    <input type="radio" name="distance" value="6"> Between 3KM-8KM<br>  
                    <input type="radio" name="distance" value="4"> Between 8KM-15KM<br>  
                    <input type="radio" name="distance" value="5"> More than 15KM<br> 
                </div>               
            </div>
            <div class="col-xs-6">
                <label for="distance">Time</label>
                <div>
                    <input type="radio" name="duration" > Any<br>
                    <input type="radio" name="duration" > Under 5 min<br>     
                    <input type="radio" name="duration" > Between 8 min-15min<br>  
                    <input type="radio" name="duration" > Between 10 min-20 min<br>  
                    <input type="radio" name="duration" > More than 30 min<br>
                </div>             
            </div>
        </div>
    </div>
            
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
            <button type="submit" class="btn btn-default">
                <i class="fa fa-search"></i> Search
            </button>
        </div>
    </div>
</form>
</div>
@endsection