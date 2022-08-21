<?php

namespace App\Http\Controllers\AllCrud;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admins;
use App\Models\User;
use App\Models\Bloggers;
use App\Http\Resources\UserResource;
use Validator;
use Auth;
use Session;

class CrudController extends Controller
{
     // this function works for all roles in the application
     public function createUser(Request $request){
        
        $validation = Validator::make($request->all(),[
            'email' => ['required', 'email'],
            'password' => ['required'],
            'name'=>['required']
        ]);

        if($validation->fails()){

            $data = [
               'message' => $validator->messages(),
                'error' => true,
            ];

            return response()->json($data,422);
        }

        $name = $request->name;
        $password = bcrypt($request->password);
        $role = $request->role;
        $email = $request->email;

        if($role == 'admin')
        {
            $admins = new Admins();
            $admins->name = $name;
            $admins->email = $email;
            $admins->password = $password;
            $admins->role = "admin";

            if($admins->save())
            {
                $data = [
                    'message' => "Admin Created Successfully!",
                    'error' => false,
                ];
                return response()->json(['response'=>$data],200);
            }
            else{
                $data = [
                    'message' => "Admin not Created Successfully!",
                    'error' => true,
                ];
                return response()->json(['response'=>$data], 404);
            }
        }
        else if($role == 'user')
        {
            $user = new User();
            $user->name = $name;
            $user->email = $email;
            $user->password = $password;
            $user->role = "user";

            if($user->save())
            {
                $data = [
                    'message' => " User Created Successfully!",
                    'error' => false,
                ];
                return response()->json(['response'=>$data],200);
            }
            else{
                $data = [
                    'message' => "User not Created Successfully!",
                    'error' => true,
                ];
                return response()->json(['response'=>$data], 404);
            }
        }
        else if($role == 'blogger')
        {
            $blogger = new Bloggers();
            $blogger->name = $name;
            $blogger->email = $email;
            $blogger->password = $password;
            $blogger->role = "blogger";

            if($blogger->save())
            {
                $data = [
                    'message' => " Blogger Created Successfully!",
                    'error' => false,
                ];
                return response()->json(['response'=>$data],200);
            }
            else{
                $data = [
                    'message' => "User not Created Successfully!",
                    'error' => true,
                ];
                return response()->json(['response'=>$data], 404);
            }
        }
        else{

            $data = [
                'message' => "Role is required",
                'user_details' => null,
                'token' => null,
                'error' => true,
            ];
            return response()->json($data,401);
        }

    }

    public function editUser(Request $request){
       
        $id = $request->id;
        $name = $request->name;
        $role = $request->role;

       
        if($role == 'user')
        {
            $user = User::find($id);
            $user->name = $name;


            if($user->save())
            {
                $data = [
                    'message' => " User Updated Successfully!",
                    'error' => false,
                ];
                return response()->json(['response'=>$data],200);
            }
            else{
                $data = [
                    'message' => "User not Updated!",
                    'error' => true,
                ];
                return response()->json(['response'=>$data], 404);
            }
        }
        else if($role == 'blogger')
        {
            $blogger = Bloggers::find($id);
            $blogger->name = $name;
        
            if($blogger->save())
            {
                $data = [
                    'message' => "Blogger Updated Successfully!",
                    'error' => false,
                ];
                return response()->json(['response'=>$data],200);
            }
            else{
                $data = [
                    'message' => "Blogger not Updated Successfully!",
                    'error' => true,
                ];
                return response()->json(['response'=>$data], 404);
            }
        }
        else{

            $data = [
                'message' => "Role is required",
                'user_details' => null,
                'token' => null,
                'error' => true,
            ];
            return response()->json($data,401);
        }
    }

    public function deleteUser(Request $request){

        $id = $request->id;
        $role = $request->role;
        
        
       
        if($role == 'user')
        {
            $user = User::find($id);

            if($user->delete())
            {
                $data = [
                    'message' => " User Deleted Successfully!",
                    'error' => false,
                ];
                return response()->json(['response'=>$data],200);
            }
            else{
                $data = [
                    'message' => "User not Deleted!",
                    'error' => true,
                ];
                return response()->json(['response'=>$data], 404);
            }
        }
        else if($role == 'blogger')
        {
            $blogger = Bloggers::find($id);
         
        
            if($blogger->delete())
            {
                $data = [
                    'message' => "Blogger Deleted Successfully!",
                    'error' => false,
                ];
                return response()->json(['response'=>$data],200);
            }
            else{
                $data = [
                    'message' => "Blogger not Deleted!",
                    'error' => true,
                ];
                return response()->json(['response'=>$data], 404);
            }
        }
        else{

            $data = [
                'message' => "Role is required",
                'user_details' => null,
                'token' => null,
                'error' => true,
            ];
            return response()->json($data,401);
        }



    }
}
