<?php

namespace App\Http\Controllers\Blogger;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blogs;


class BloggerController extends Controller
{
    public function dashboard(Request $request)
    {
        $blogs = Blogs::all();
        return view('system.blogger.dashboard',compact('blogs'));
    }

    public function createBlog(Request $request){

        $title = $request->title;
        $description= $request->blog_description;

        $blogs = new Blogs();
        $blogs->title = $title;
        $blogs->description = $description;
         
        if($blogs->save())
        {
            $data = [
                'message' => "Blog Added Successfully!",
                'error' => false,
            ];
            return response()->json(['response'=>$data],200);
        }
        else{
            $data = [
                'message' => "blog not added",
                'error' => true,
            ];
            return response()->json(['response'=>$data], 404);
        }


    }
}
