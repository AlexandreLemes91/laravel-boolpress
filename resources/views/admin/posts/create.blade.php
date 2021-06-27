@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <h2>Create new Post</h2>
                <form action="{{ route('admin.posts.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    
                    <label for="title" class="form-label">Title</label>
                    <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}">
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="content">Content</label>
                    <textarea name="content" id="content" class="form-control">{{ old('content') }}</textarea>
                    @error('content')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label class="form-label mt-3" for="category_id">Category</label>
                    <select class="form-control" name="category_id" id="category_id">
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                @if( $category->id == old('category_id')) selected @endif
                                >{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <button class="mt-3 btn btn-secondary" type="submit">Create</button>
                </form>
            </div>
        </div>
    </div>

@endsection