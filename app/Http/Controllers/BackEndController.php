<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BackEndController extends Controller
{
    
    
    public function index(){
        return view('dashboard');
    }

    public function listBlog(){
        
        $blogs= Blog::orderBy('created_at','desc')->get();
        return view('list-blog')->with('blogs',$blogs);
    }

    public function addBlog(){
        return view('add-blog');
    }

    public function createBlog(Request $request){
        $request->validate([
            'title' => 'required|max:50',
            'author' => 'required',
            'description' => 'required',
        ]);

        $blog =new Blog;
        $blog->title=$request->input('title');
        $blog->author=$request->input('author');
        $blog->description=$request->input('description');
        $blog->save();
        $lastInsertId=$blog->id;
        return redirect('admin/list-blog')->with('success','Blog Created');
    }

    public function editBlog($id){
        $data['blog']=Blog::find($id);
        return view('edit-blog')->with('data',$data);
 
    }
    public function updateBlog(Request $request, $id){
        $request->validate([
            'title' => 'required|max:50',
            'author' => 'required',
            'description' => 'required',
        ]);

        $blog=Blog::find($id);
        $blog->title=$request->input('title');
        $blog->author=$request->input('author');
        $blog->description=$request->input('description');
        $blog->save();
        return redirect('admin/list-blog')->with('success','Blog Created');
    }

    public function deleteBlog($id){
        Blog::destroy($id); 
        return redirect('admin/list-blog')->with('success','Blog Created');
   }
}
