<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admins;
use App\Models\User;
use App\Models\Bloggers;
use App\Http\Resources\UserResource;
use Validator;
use Auth;
use Session;

class LoginController extends Controller
{
    public function login(Request $request){
       return view('auth.login');
    }
    
    public function loginAttempt(Request $request){
        
        $validation = Validator::make($request->all(),[
            'email' => ['required', 'email'],
            'password' => ['required'],
            'login_type'=>['required']
        ]);

        // if($validation->fails()){

        //     $data = [
        //        'message' => $validator->messages(),
        //         'error' => true,
        //     ];

        //     return response()->json($data,422);
        // }

        $login_type = $request->login_type;

        if($login_type == 'admin')
        {      

            $credentials = [
                'email' => $request->email,
                'password' => $request->password
            ];

            if (Auth::guard('web-admins')->attempt($credentials)) 
            {

                $token = Auth::guard('web-admins')->user()->createToken('Gharbaar.com')->accessToken;

                if(Session::has('token'))
                {
                    Session::forget('token');
                }

                Session::put('token',$token);

                return redirect()->route('admin.dashboard');
                // $data = [
                //     'message' => "logged In Successfully!",
                //     'user_details' => new UserResource(Auth::guard('web-admins')->user()),
                //     'token' => $token,
                //     'error' => false,
                // ];
                // return response()->json(['response'=>$data],200);
              
            }
            else{
               
                return redirect()->back()->with('login_error', 'Invalid Credentials!');   
        
            }
        
        }
        else if($login_type == 'blogger')
        {
            $credentials = [
                'email' => $request->email,
                'password' => $request->password
            ];

            if (Auth::guard('web-bloggers')->attempt($credentials)) 
            {

                $token = Auth::guard('web-bloggers')->user()->createToken('Gharbaar.com')->accessToken;


                if(Session::has('token'))
                {
                    Session::forget('token');
                }

                Session::put('token',$token);

               
                return redirect()->route('blogger.dashboard');
        
              
            }
            else{
               
                // $data = [
                //     'message' => "Invalid Credentials",
                //     'user_details' => null,
                //     'token' => null,
                //     'error' => true,
                // ];
                // return response()->json($data,401);

                return redirect()->back()->with('login_error', 'Invalid Credentials!');   

        
            }
        }
        else if($login_type == 'user')
        {
            $credentials = [
                'email' => $request->email,
                'password' => $request->password
            ];

            if (Auth::attempt($credentials)) 
            {

                $token = Auth::user()->createToken('Gharbaar.com')->accessToken;

                if(Session::has('token'))
                {
                    Session::forget('token');
                }

                Session::put('token',$token);

               
                return redirect()->route('user.dashboard');
        
              
            }
            else{
               
                // $data = [
                //     'message' => "Invalid Credentials",
                //     'user_details' => null,
                //     'token' => null,
                //     'error' => true,
                // ];
                // return response()->json($data,401);
                return redirect()->back()->with('login_error', 'Invalid Credentials!');   

        
            }
        }
        
    }

    public function logout(Request $request){

        $role = $request->role;

        if($role == "admin")
        {
            Auth::guard('web-admins')->logout();
            $request->session()->invalidate();

        }
        else if($role == "user"){
            Auth::logout();
            $request->session()->invalidate();


        }
        else if($role == "blogger")
        {   
            Auth::logout('web-bloggers');
            $request->session()->invalidate();


        }
        
        return redirect('/login');
    }

   
}
