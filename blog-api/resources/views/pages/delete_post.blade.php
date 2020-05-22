@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1>Delete Post</h1>
        <p>{{ $post->title }}<br>written: {{ $post->created_at }}</p>
    </div>

    <section id="blog-post">
        <p>Are you sure you want to delete this post?</p>
        <p><a class="btn btn-danger btn-lg mr-2" href="{{ url('/destroy_post/'.$post->id) }}" role="button">Yes</a><a class="btn btn-success btn-lg" href="{{ url('/view_post/'.$post->id) }}" role="button">No</a></p>
    </section>
@endsection