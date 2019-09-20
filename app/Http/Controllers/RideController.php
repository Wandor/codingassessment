<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RideController extends Controller
{
    public function index()
    {
        return view('search');
    }
    public function Search()
    {
        //get keywords input for search
        $keyword=  Input::get('keyword');

        //search that ride in Database
         $ride= Ride::find($keyword);

        //return display search result to user by using a view
        return Redirect::route('result', array('ride' => $ride));
    }

    public function result($ride)
    {
        return view('result');
    }
}
