<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Flight;

class SearchController extends Controller
{
    //
    public function search(Request $request){
        $origin = $request->origin;
        $depature = $request->depature;
        $destination = $request->destination;
        
        $flight = Flight::where([
            ['origin', $origin ],
            ['destination', $destination],
            ['depature', $depature]
        ])->get();

        if($flight->count() > 0){
            return response()->json([
                "status"=>200,
                "data"=>$flight
            ],200);
        }else{
            return response()->json([
                "status"=>404,
                "data"=>"No Record found"
            ],404);
        }
        
    }
}
