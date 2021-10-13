<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(){

        $users = User::paginate(20);
        return response()->json($users);

    }

    public function store(Request $request){

        $request->validate([
            'username' => ['required', 'string', 'max:255','unique:users'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' =>['required','email','unique:users'],
            'password' => ['required','string','min:8', 'confirmed']

        ]);

        $user  = new User;
        $user->username = $request->username;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = $request->password;
        if($user->save()){
            return response()->json('User Added Successfully');
        }else{
            return response()->json('Something Went Wrong');
        }

    }


    public function update(Request $request, $id){

        $request->validate([
            'username' => ['required', 'string', 'max:255','unique:users'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' =>['required','email','unique:users'],
            'password' => ['required','string','min:8', 'confirmed']

        ]);

        $user  = User::find($id);

        $user->username = $request->username;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = $request->password;
        if($user->save()){

            return response()->json('User Updated Successfully');

        }else{
            return response()->json('Something Went Wrong');

        }





    }

    public function destroy($id){

        $user = User::find($id);
        if($user->delete()){

            return response()->json();


        }

    }

}
