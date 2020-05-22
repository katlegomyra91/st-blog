<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('pages.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create_post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        if ($request->title && $request->content) {
            $post = new Post;
            
            $post->title = $request->title;
            $post->content = $request->content;
            
            $post->save();
            return view('pages.view_post')->withPost($post);
        } else {
            return redirect('/')->with('error', 'Post could not be created');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $post = Post::find($id);
        if (!isset($post)){
            return redirect('/')->with('error', 'Post not found');
        }
        return view('pages.view_post')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        if (!isset($post)){
            return redirect('/')->with('error', 'Post not found');
        }
        return view('pages.edit_post')->withPost($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->title && $request->content) {
            $post = Post::find($id);

            if ($post) {
                $post->title = $request->title;
                $post->content = $request->content;
            
                $post->save();
                return view('pages.view_post')->withPost($post);
            } else {
                return redirect('/')->with('error', 'Post not found');
            }
        } else {
            return redirect('/')->with('error', 'Post could not be edited');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $post = Post::find($id);
        if (!isset($post)){
            return redirect('/')->with('error', 'Post not found');
        }
        return view('pages.delete_post')->withPost($post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        
        if ($post) {
            $post->delete();
            return redirect('/')->with('success', 'Post has been deleted');
        } else {
            return redirect('/')->with('error', 'Post could not be deleted');
        }
    }
}
