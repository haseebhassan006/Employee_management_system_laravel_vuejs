<?php

namespace App\Http\Controllers\Api;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CountryController extends Controller
{
    public function index(){

        $country = Country::paginate(5);
        return response()->json($country);
    }

    public function store(Request $request){

     $request->validate([
         'name' => "required"
     ]);

     $Country = new Country;
     $Country->name = $request->name;
     if($Country->save()){
         return response()->json("Country Added Succesfully");
     }else{
         return response()->json('Failed To Add Country');
     }


    }

    public function update(Request $request,$id){

       $request->validate([
           'name' => 'required'
       ]);

       $Country  = Country::find($id);
       $Country->name = $request->name;
       if($Country->save()){
           return response()->json('Country Updated Succesfully');
       }else{
           return response()->json('Something Went Wrong');
       }

    }


    public function destroy($id){

     $country = Country::find($id);
    if($country->delete()){
        return response()->json('Country Deleted Successfully');
    }else{
        return response()->json('Something Went Wrong');
    }

    }
}
