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
        $cancelled = $request->input('cancelled');
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
                    return $rides->toArray();
            return view('result', compact('rides'));
                // return $rides->toArray();
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


    public function doSearch(Request $request)
    {
       $model = new Ride();
       $query = $model->newQuery();

       if ($request->has('keyword')) {
           $query->where('pickup_location', 'LIKE', "%{$request->keyword}%")
               ->orWhere('dropoff_location', 'LIKE', "%{$request->keyword}%");
       }

        if ($request->has('distance')) {
            switch ($request->distance) {
                case '3':
                    $query->where('distance', '>', $request->distance);
                    break;
                case '4':
                    $query->whereBetween('distance', [8,15]);
                    break;
                default:
                    break;
            }
        }



        if ($request->has('cancelled')) {
            $query->orWhere('status', 'CANCELLED');
        } else {
            $query->where('status', '!=', 'CANCELLED');
        }

        $rides = $query->get();

        return view('search', get_defined_vars());
    }

    public function details($id)
    {
       $ride = Ride::findOrFail($id);
        return view('details', compact('ride'));
    }

}
