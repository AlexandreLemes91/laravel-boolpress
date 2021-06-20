@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Posts</h1>
        <a href="{{ route('admin.posts.create') }}">New Pasta</a>

        @if( session('deleted') )
            <div class="alert alert-success">
                <span>Post <em>{{ session('deleted') }}</em> Cancellato</span>
            </div>
        @endif
    
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th colspan="3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>
                            <a class="btn btn-link" href="{{ route('admin.posts.show', $post->id) }}">SHOW</a>
                        </td>
                        <td>
                            <a class="btn btn-link" href="{{ route('admin.posts.edit', $post->id) }}">EDIT</a>
                        </td>
                        <td>
                            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-link" type="submit" value="Delete">
                            </form>
                        </td>
                    </tr>  
                @endforeach
            </tbody>
    </div>
    </table>
@endsection