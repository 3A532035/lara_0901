<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminPostsController extends Controller
{
    public function index()
    {
        $posts=Post::orderBy('created_at','DESC')->get();
        $data=['posts'=>$posts];
        return view('admin.posts.index',$data);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function edit($id)
    {
//        $data = ['id' => $id];
        $posts=Post::find($id);
        $data=['post'=>$posts];
//        return dd($data);
        return view('admin.posts.edit', $data);
    }

    public function store(Request $request)
    {
        Post::create($request->all());
        return redirect('/admin/posts');
    }

    public function update(Request $request,$id){
        $post=Post::find($id);
        $post->update($request->all());
        return redirect('/admin/posts');
    }

    public function destory(Request $request,$id){
        $post=Post::destroy($id);
        return redirect()->route('admin.posts.index');
    }
}
