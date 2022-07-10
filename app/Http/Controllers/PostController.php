<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|min:6',
            'content' => 'required',
            'status' => 'required'
        ]);

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'status' => $request->status,
            'slug' => Str::slug($request->title)
        ]);

        if ($post) {
            return redirect()
                ->route('post.index')
                ->with([
                    'success' => 'Berhasil Menambahkan data baru'
                ]);
        }else{
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'gagal Menambahkan data baru'
                ]);
        }
    }

    public function edit($id){
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>'required|min:6',
            'content'=>'required',
            'status'=>'required'
        ]);

        $post = Post::findOrFail($id);

        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'status' => $request->status,
            'slug' => Str::slug($request->title)
        ]);

        if ($post) {
            return redirect()
                        ->route('post.index')
                        ->with([
                            'success' => 'Sukses edit content'
                        ]);
            
        }else{
            return redirect()
                        ->back()
                        ->withInput()
                        ->with([
                            'error' => 'gagal mengupdate'
                        ]);
            
        }
    }
}
