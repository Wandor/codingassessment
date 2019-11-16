<?php

namespace App\Http\Controllers;
use App\Ride;
use DB;
use Illuminate\Http\Request;
use TeamTNT\TNTSearch\TNTSearch;

class RideController extends Controller
{
 public function results(){
     $rides = Ride::orderByDesc('created_at')->paginate(10);
     return view('result')->withRides($rides);
 }

    public function Search(Request $request, Ride $rides)
    {
        $rides = $rides->newQuery();
        //filter out rides based on keyword search
        if($request->has('keyword'))
        {
            $rides = Ride::search($request->input('keyword'))
                            ->where('status', 'completed')
                            ->get();

        };
        //filter based on cancelled rides
        if($request->has('cancelled'))
        {
            $rides = Ride::search($request->input('keyword'))->get();

        }
        //filter based on distance
        if($request->has('distance'))
        {
            $rides = DB::table('rides')
                ->where(
                    [
                        ['distance', '>', 3],
                        ['status','=','completed'],
                    ]
                    )->get();
            // return $rides->where('distance', '=<', 3);
            // $rides = Ride::search($request->input('keyword'))->get();
        }
        if($request->has(['distance', 'cancelled'])){
            $rides = DB::table('rides')
                ->where('distance', '=<', 3)->get();
        }
        // return $rides->get();
        if($request->has('duration'))
        {
            $rides = DB::table('rides')
                ->where(
                    [
                        ['duration', '>', 3],
                        ['status','=','completed'],
                    ]
                    )->get();
        }
        if($request->has(['duration', 'cancelled'])){
            $rides = DB::table('rides')
                ->where('duration', '=<', 3)->get();
        }
        // return json_decode($rides->get());

        // $ridedata= json_decode($rides, true);

        return view('result', compact('rides'));

    }


    public function details($id)
    {
       $ride = Ride::findOrFail($id);
        return view('details', compact('ride'));

    }
    // public function details($id)
    // {
    //     $rides=DB::select(DB::raw("SELECT * FROM rides WHERE id='$id'"));
    //     // $rides = DB::select(DB::raw("SELECT * FROM rides')
    //     //                 ->where('id',$id)->get();
    //     $rides = $rides->get();
    //     return view('details', compact('rides'));

    // }
}
