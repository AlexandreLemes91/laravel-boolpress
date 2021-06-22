@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <h2>Edit Post: <em>{{ $post->title }}</em></h1>
                <form action="{{ route('admin.posts.store') }}" method="POST">
                    @csrf
                    @method('POST')
        
                    <label class="form-label mt-3" for="title">Title</label>
                    <input class="form-control" type="text" name="title" id="title" value="{{ $post->title }}">
                    <label class="form-label mt-3" for="content">Content</label>
                    <textarea class="form-control" name="content" id="content" cols="10" rows="5">{{ $post->content }}</textarea>

                    <label class="form-label mt-3" for="category_id">Category</label>
                    <select class="form-control" name="category_id" id="category_id">
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>

                    <button type="submit" class="btn btn-secondary mt-3" href="{{ route('admin.posts.update', $post->id) }}">Update</button>
                </form>
            </div>
        </div>
    </div>

@endsection