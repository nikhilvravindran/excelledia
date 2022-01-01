<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogComments;

class FrontEndController extends Controller
{
    public function index(){
        $blogs= Blog::limit(5)->orderBy('created_at','desc')->get();
        return view('home')->with('blogs',$blogs);
    }

    public function readBlog($id){
        $blog=Blog::find($id);
        return view('read-blog', compact('blog'));
     }

    public function addComment(Request $request){


        $request->validate([
            'name' => 'required',
            'comment' => 'required',
        ]);

        $input = $request->all();
        BlogComments::create($input);
        return back();
        
    }

}
