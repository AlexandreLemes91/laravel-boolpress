@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->content }}</p>

        <a class="btn btn-secondary" href="{{ route('admin.posts.edit', $post->id) }}">Edit</a>
        <a class="btn btn-secondary" href="{{ route('admin.posts.destroy', $post->id) }}">Edit</a>
    </div>
@endsection