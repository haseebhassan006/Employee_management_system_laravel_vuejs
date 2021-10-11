<?php

namespace App\Http\Controllers\Api;

use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
   public function index(){

       $cities = City::paginate(5);
       return response()->json($cities);
   }

   public function store(Request $request){

    $request->validate([
        'name' => "required"
    ]);

    $city = new City;
    $city->name = $request->name;
    if($city->save()){
        return response()->json("City Added Succesfully");
    }else{
        return response()->json('Failed To Add City');
    }


   }

   public function update(Request $request, id $id){

      $request->validate([
          'name' => 'required'
      ]);

      $city  = City::find($id);
      $city->name = $request->name;
      if($city->save()){
          return response()->json('City Updated Succesfully');
      }else{
          return response()->json('Something Went Wrong');
      }

   }


   public function destroy($id){

    $city = City::find($id);
   if($city->delete()){
       return response()->json('City Deleted Successfully');
   }else{
       return response()->json('Something Went Wrong');
   }

   }
}
