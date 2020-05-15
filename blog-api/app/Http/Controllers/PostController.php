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
        return response()->json(['data' => $posts], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        if ($request->title && $request->content && $request->status_id) {
            $post = new Post;
            
            $post->title = $request->title;
            $post->content = $request->content;
            $post->status_id = $request->status_id;
            
            $post->save();
            return response()->json(['data' => $post], 201);
        } else {
            return response()->json(['error' => 'incomplete request body'], 400);
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
        if ($post) {
            return response()->json(['data' => $post], 200);
        } else {
            return response()->json(['error' => 'post not found'], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 
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
        if ($request->title && $request->content && $request->status_id) {
            $post = Post::find($id);

            if ($post) {
                $post->title = $request->title;
                $post->content = $request->content;
                $post->status_id = $request->status_id;
            
                $post->save();
                return response()->json(['data' => $post], 201);
            } else {
                return response()->json(['error' => 'post not found'], 404);
            }
        } else {
            return response()->json(['error' => 'incomplete request body'], 400);
        }
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
            return response()->json(['message' => 'post deleted'], 200);
        } else {
            return response()->json(['error' => 'post not found'], 404);
        }
    }
}
