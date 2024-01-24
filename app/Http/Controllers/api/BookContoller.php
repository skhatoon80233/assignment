<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Ticket;

class BookContoller extends Controller
{
  
    public function book(Request $request){
        $validator = Validator::make($request->all(),[
            'flight_id'=>'required',
            'ticket_number'=>'required',
            'passenger_name'=>'required',
            'boarding_gate'=>'required',
            'class'=>'required',
            'seat'=>'required',
            'boarding_time'=>'required'

        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>422,
                'error'=>$validator->messages()
            ],422);
        }
        else{
            $boarding_time = date('Y-m-d H:i:s', strtotime($request->boarding_time));

            $ticket = Ticket::create([
                'flight_id'=>$request->flight_id,
                'ticket_number'=>$request->ticket_number,
                'passenger_name'=>$request->passenger_name,
                'boarding_gate'=>$request->boarding_gate,
                'class'=>$request->class,
                'seat'=>$request->seat,
                'boarding_time'=>$boarding_time,
                'status'=>$request->status
            ]);
            
            if($ticket){
                return response()->json([
                    "status"=>200,
                    "data"=>"Record added successfully"
                ],200);
            }
            else{
                return response()->json([
                    "status"=>404,
                    "data"=>"Something Went wrong"
                ],404);
            }
        }
    }

    public function CancelBooking(Request $request){
        
        $validator = Validator::make($request->all(),[
            "status"=>"require",
            "id"=>'require'
        ]);
        
        
        $status = $request->status;

        $ticket = Ticket::where('id',$request->id)->update([
            'status'=>$request->status
        ]);
        
        if($ticket){
            return response()->json([
                "status"=>200,
                "data"=>"Booking ".$status." successfully"
            ],200);
        }
        else{
            return response()->json([
                "status"=>404,
                "data"=>"Something Went wrong"
            ],404);
        }
    }
}
