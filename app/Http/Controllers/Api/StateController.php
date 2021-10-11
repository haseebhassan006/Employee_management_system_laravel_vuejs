<?php

namespace App\Http\Controllers\Api;

use App\Models\State;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StateController extends Controller
{
    public function index(){

        $states = State::paginate(5);
        return response()->json($states);
    }

    public function store(Request $request){

     $request->validate([
         'name' => "required"
     ]);

     $state = new State;
     $state->name = $request->name;
     if($state->save()){
         return response()->json("State Added Succesfully");
     }else{
         return response()->json('Failed To Add State');
     }


    }

    public function update(Request $request,$id){

       $request->validate([
           'name' => 'required'
       ]);

       $state  = State::find($id);
       $state->name = $request->name;
       if($state->save()){
           return response()->json('State Updated Succesfully');
       }else{
           return response()->json('Something Went Wrong');
       }

    }


    public function destroy($id){

    $state = State::find($id);

    if($state->delete()){
        return response()->json('State Deleted Successfully');
    }else{
        return response()->json('Something Went Wrong');
    }

    }
}
