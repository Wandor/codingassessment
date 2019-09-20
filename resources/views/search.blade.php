<!-- resources/views/search.blade.php -->

@extends('app')

@section('content')

    <!-- Bootstrap Boilerplate... -->
    
    <div class="panel-body">
    <h1>Search Ride</h1>
        <form method="post" action="{{url('/search')}}">
        {{csrf_field()}}
        <div>
            <div class="input-group">
                <input type="text" class="form-control" name="keyword" placeholder="Search ride"> 
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
            </div>
            <div>
                <label for="checkbox">Include Cancelled Trips</label>
                    <input  name="cancelled" type="checkbox" value="yes">
            </div>
            <div>
                <label for="distance">Distance</label>
                    <input type="radio" name="distance" > Any<br>
                    <input type="radio" name="distance" > Under 3KM<br>     
                    <input type="radio" name="distance" > Between 3KM-8KM<br>  
                    <input type="radio" name="distance" > Between 8KM-15KM<br>  
                    <input type="radio" name="distance" > More than 15KM<br>          
            </div>
            <div>
                <label for="distance">Time</label>
                    <input type="radio" name="distance" > Any<br>
                    <input type="radio" name="distance" > Under 5 min<br>     
                    <input type="radio" name="distance" > Between 8 min-15min<br>  
                    <input type="radio" name="distance" > Between 10 min-20 min<br>  
                    <input type="radio" name="distance" > More than 30 min<br>          
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