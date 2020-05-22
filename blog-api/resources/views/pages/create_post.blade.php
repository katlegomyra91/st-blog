  
@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1>Create Post</h1>
    </div>
    {!! Form::open(['action' => "PostController@store", 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('content', 'Body')}}
            {{Form::textarea('content', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Blog content here'])}}
        </div>
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection