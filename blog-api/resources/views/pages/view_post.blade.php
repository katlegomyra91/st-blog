@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1>{{ $post->title }}</h1>
        <p>written: {{ $post->created_at }}</p>
    </div>

    <section id="blog-post">
        <div class="card mb-2">
            <div class="card-body">
                <p>{{ $post->content }}</p>
            </div>
        </div>
    </section>
    <p><a class="btn btn-primary btn-lg" href="{{ url('/') }}" role="button">< Back</a></p>
@endsection