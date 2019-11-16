<?php

namespace App\Http\Controllers;
use App\Ride;
use DB;
use Illuminate\Http\Request;
use TeamTNT\TNTSearch\TNTSearch;

class RideController extends Controller
{
    
    public function Search(Request $request, Ride $rides)
    {
        $rides = $rides->newQuery();
        //filter out rides based on keyword search
        if($request->filled('keyword'))
        {
            $rides = Ride::search($request->input('keyword'))
                            ->where('status', 'completed')->get();
            
        };
        //filter based on cancelled rides
        if($request->has('cancelled'))
        {
            $rides = Ride::search($request->input('keyword'));
            
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
                    );
            // return $rides->where('distance', '=<', 3);
            // $rides = Ride::search($request->input('keyword'))->get();
            // var_dump(json_encode($rides));
        }
        if($request->has(['distance', 'cancelled'])){
            $rides = DB::table('rides')
                ->where('distance', '=<', 3);
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
                    );
            // return $rides->where('distance', '=<', 3);
            // $rides = Ride::search($request->input('keyword'))->get();
            // var_dump(json_encode($rides));
        }
        if($request->has(['duration', 'cancelled'])){
            $rides = DB::table('rides')
                ->where('duration', '=<', 3);
        }
        // if($request->input()){
        //     $rides = DB::table('rides')
        //         ->where('duration', '=<', 3);

        // }
        
        // var_dump($rides);
        $newrides= json_decode($rides, true);
        // dd($rides);
        return view('/result',compact('newrides'));
        
    }


    public function result($ride)
    {
        return view('result');
    }
}
