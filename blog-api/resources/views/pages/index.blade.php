@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1>Welcome ST Blog!</h1>
        <p>Your <u>FREE</u>, <strong><i>no profile</i></strong> blog, just let it all out!</p>
        <p><a class="btn btn-primary btn-lg" href="{{ url('/create') }}" role="button">Get Started</a></p>
    </div>

    <section id="blog-posts">
        <h1 class="text-center">Latest Posts</h1>
        @if(count($posts) > 0)
            @foreach($posts as $post)
                <div class="card mb-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-10">
                                <a href="{{ url('/view_post/'.$post->id) }}"><h5 class="card-title">{{ $post->title }}</h5></a>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $post->created_at." | ".substr($post->content, 0, 50)."..." }}</h6>
                            </div>
                            <div class="col-sm-2">
                            <div class="btn-group" role="group">
                                <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Actions
                                </button>
                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                <a class="dropdown-item" href="{{ url('/view_post/'.$post->id) }}">Read</a>
                                <a class="dropdown-item" href="{{ url('/edit_post/'.$post->id) }}">Edit</a>
                                <a class="dropdown-item" href="{{ url('/delete_post/'.$post->id) }}">Delete</a>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p>No blog posts found</p>
        @endif
    </section>
@endsection