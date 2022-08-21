<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admins;
use App\Models\Bloggers;
use App\Models\User;



class AdminController extends Controller
{
    public function dashboard(Request $request)
    {
        $admins = Admins::orderBy('id','Desc')->get();
        $bloggers = Bloggers::orderBy('id','Desc')->get();
        $users = User::orderBy('id','Desc')->get();

        return view('system.admin.dashboard',compact('admins','bloggers','users'));
    }
}
