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
                    <input type="text" id="title" name="title" class="form-control">
                    <label for="content">Content</label>
                    <textarea name="content" id="content" class="form-control"></textarea>

                    <button class="mt-3 btn btn-secondary" type="submit">Create</button>
                </form>
            </div>
        </div>
    </div>

@endsection