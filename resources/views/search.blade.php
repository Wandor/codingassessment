<!-- resources/views/search.blade.php -->

@extends('app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <h1 class ="text-center">Search Ride</h1>
        <form method="get" action="{{ route('search') }}">
        <div>
            <div class="input-group">
                <input value="{{request('keyword')}}" type="text" class="form-control" name="keyword" placeholder="Search ride by keyword" >
            </div>
            <div class="text-center">
                <label for="checkbox" style="word-wrap:break-spaces;">Include Cancelled Trips</label>
                    <input  name="cancelled" type="checkbox"  value="cancelled" {{ request('cancelled') ? 'checked' : '' }}>
            </div>
            <div class="container">
            <div class="row">
            <div class="col-xs-6">
                <label for="checkbox">Distance</label>
                <div>
                    <input type="radio" name="distance" value="1" {{ request('distance') == '1' ? 'checked' : '' }}> Any<br>
                    <input type="radio" name="distance" value="3" {{ request('distance') == '3' ? 'checked' : '' }}> Under 3KM<br>
                    <input type="radio" name="distance" value="6" {{ request('distance') == '6' ? 'checked' : '' }}> Between 3KM-8KM<br>
                    <input type="radio" name="distance" value="4" {{ request('distance') == '4' ? 'checked' : '' }}> Between 8KM-15KM<br>
                    <input type="radio" name="distance" value="5" {{ request('distance') == '5' ? 'checked' : '' }}> More than 15KM<br>
                </div>
            </div>
            <div class="col-xs-6">
                <label for="distance">Time</label>
                <div>
                    <input type="radio" name="duration"> Any<br>
                    <input type="radio" name="duration"> Under 5 min<br>
                    <input type="radio" name="duration"> Between 8 min-15min<br>
                    <input type="radio" name="duration"> Between 10 min-20 min<br>
                    <input type="radio" name="duration"> More than 30 min<br>
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
        </div>
</form>
</div>
    @include('result', ['rides' => $rides])
@endsection
