<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index(){

        $departments = Department::paginate(5);
        return response()->json($departments);
    }

    public function store(Request $request){

     $request->validate([
         'name' => "required"
     ]);

     $department = new Department;
     $department->name = $request->name;
     if($department->save()){
         return response()->json("Department Added Succesfully");
     }else{
         return response()->json('Failed To Add Department');
     }


    }

    public function update(Request $request, id $id){

       $request->validate([
           'name' => 'required'
       ]);

       $department  = Department::find($id);
       $department->name = $request->name;
       if($department->save()){
           return response()->json('Department Updated Succesfully');
       }else{
           return response()->json('Something Went Wrong');
       }

    }


    public function destroy($id){

     $department = Department::find($id);
    if($department->delete()){
        return response()->json('Department Deleted Successfully');
    }else{
        return response()->json('Something Went Wrong');
    }

    }
}

