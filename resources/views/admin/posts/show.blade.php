@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $post->title }}</h1>
        @if ($post->category)
            <h4>{{ $post->category->name }}</h4>
        @endif
        @if (count($post->tags) > 0)
            <h5>Tags</h5>
            @foreach ($post->tags as $tag)
                <span class="badge-primary">{{ $tag->name }}</span>
            @endforeach
        @endif

        <h3 class="mt-3">Content</h3>
        <p>{{ $post->content }}</p>

        <a class="btn btn-secondary" href="{{ route('admin.posts.edit', $post->id) }}">Edit</a>

        <form class="d-inline" action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <input class="btn btn-secondary" type="submit" value="Delete">
        </form>
    </div>
@endsection