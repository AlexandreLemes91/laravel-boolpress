@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <h2>Edit Post: <em>{{ $post->title }}</em></h1>
                <form action="{{ route('admin.posts.update', $post->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
        
                    <label class="form-label mt-3" for="title">Title</label>
                    <input class="form-control" type="text" name="title" id="title" value="{{ old('title', $post->title) }}">
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label class="form-label mt-3" for="content">Content</label>
                    <textarea class="form-control" name="content" id="content" cols="10" rows="5">{{ old('content', $post->content) }}</textarea>
                    @error('content')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label class="form-label mt-3" for="category_id">Category</label>
                    <select class="form-control" name="category_id" id="category_id">
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                @if( $category->id == old('category_id', $post->category_id)) selected @endif
                                >{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <button type="submit" class="btn btn-secondary mt-3" href="{{ route('admin.posts.update', $post->id) }}">Update</button>
                </form>
            </div>
        </div>
    </div>

@endsection