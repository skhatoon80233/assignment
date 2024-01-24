<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Flight;
use App\Models\Ticket;

class FlightController extends Controller
{
    
    public function index(Request $request){
        $flight = Flight::all();
        
        if($flight->count() > 0){
            return response()->json([
                "status"=>200,
                "data"=>$flight
            ],200);
        }
        return response()->json([
            "status"=>404,
            "data"=>"No Record found"
        ],404);
    }

    public function insert(Request $request){

        $validator = Validator::make($request->all(),[
            'origin'=> 'required',
            'destination'=> 'required',
            'flight_number'=> 'required',
            'depature'=> 'required',
            'name'=> 'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>422,
                'error'=>$validator->messages()
            ],422);
        }
        else{

            $depature = date('Y-m-d', strtotime($request->depature));
        
            $arrival = date('Y-m-d', strtotime($request->arrival));

            $flight = Flight::create([
                "name"=>$request->name,
                "origin"=>$request->origin,
                "destination"=>$request->destination,
                "flight_number"=>$request->flight_number,
                "depature"=>$depature,
                "arrival"=>$arrival,
                "seats"=>$request->seats,
                "price"=>$request->price,
            ]);
            
            if($flight){
                return response()->json([
                    "status"=>200,
                    "data"=>"Record added successfully"
                ],200);
            }
            else{
                return response()->json([
                    "status"=>404,
                    "data"=>"Something Went wrong"
                ],200);
            }
        }
        
    }

    public  function bookinglist(){

        $ticket = Ticket::all();
        
        if($ticket->count() > 0){
            return response()->json([
                "status"=>200,
                "data"=>$ticket
            ],200);
        }
        else{
            return response()->json([
                "status"=>404,
                "data"=>"Something Went wrong"
            ],404);
        }
    }

    public function getPaginatedFlights(Request $request)
	{
    		$perPage = $request->query('per_page', 10); // Number of items per page
    		$ticket = Ticket::with('origin', 'destination')->paginate($perPage);
    		return response()->json($ticket);
	}
}
