@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->content }}</p>

        <a class="btn btn-secondary" href="{{ route('admin.posts.edit', $post->id) }}">Edit</a>

        <form class="d-inline" action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <input class="btn btn-secondary" type="submit" value="Delete">
        </form>
    </div>
@endsection