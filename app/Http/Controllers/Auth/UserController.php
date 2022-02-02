<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Testing\Fluent\Concerns\Has;

class UserController extends Controller
{
     function index(){
         return view('Auth.register');
     }
     function save(Request $request){
         $validator = Validator::make($request->all(),
             [
                 'name' => 'required',
                 'email' => 'required|unique:users',
                 'password' => 'required',

             ]
         );
         if ($validator->fails()) {
             return redirect()->back()
                 ->withInput()
                 ->withErrors($validator);
         }

          $save = new User();
           $save->name = $request->name;
           $save->email = $request->email;
           $save->password = Hash::make($request->password);
           $save->save();
           if ($save==true){
               $notification = array(
                   'message' => 'Register Successfully',
                   'alert-type' => 'success'
               );
               return redirect()->back()->with($notification);
           }


     }

     function login_index(){
         return view('Auth.login');
     }

     function login(Request $request){
         $validator = Validator::make($request->all(),
             [
                 'email' => 'required',
                 'password' => 'required',

             ]
         );
         if ($validator->fails()) {
             return redirect()->back()
                 ->withInput()
                 ->withErrors($validator);
         }
      /*   $check = User::where('email', '=', $request->email)->first();
         if (!isset($check)) {

             $notification = array(
                 'message' => 'Credentials are not matched',
                 'alert-type' => 'error'
             );
             return redirect()->back()->with($notification);
         }*/

          $credentials = $request->only('email','password');
         if (Auth::attempt($credentials)){
             return  redirect()->intended('dashboard');
         }
          else{
              $notification = array(
                  'message' => 'Credentials are not matched',
                  'alert-type' => 'error'
              );
              return redirect()->back()->with($notification);
          }
     }

    function logout()
    {
        /*session()->forget("username");
        session()->flush();*/
        Auth::logout();
        return redirect()->route('login');
    }

}
