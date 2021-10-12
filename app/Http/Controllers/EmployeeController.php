<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(){

        $employees =  Employee::paginate(5);
        return response()->json($employees);
    }

    public function store(Request $request){

     $request->validate([
         'name' => "required",

     ]);

     $employee = new Employee;
     $employee->name = $request->name;
     if($employee->save()){
         return response()->json("Employee Added Succesfully");
     }else{
         return response()->json('Failed To Add Employee');
     }


    }

    public function update(Request $request,$id){

       $request->validate([
           'name' => 'required'
       ]);

       $employee  = Employee::find($id);
       $employee->name = $request->name;
       if($employee->save()){
           return response()->json('Employee Updated Succesfully');
       }else{
           return response()->json('Something Went Wrong');
       }

    }


    public function destroy($id){

     $Employee = Employee::find($id);
    if($Employee->delete()){
        return response()->json('Employee Deleted Successfully');
    }else{
        return response()->json('Something Went Wrong');
    }

    }
}

