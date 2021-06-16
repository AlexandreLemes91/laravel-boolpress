@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Posts</h1>
    
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
                            <a href="{{ route('admin.posts.show', $post->id) }}">SHOW</a>
                        </td>
                        <td>
                            <a href="">EDIT</a>
                        </td>
                        <td>
                            <a href="">DELETE</a>
                        </td>
                    </tr>  
                @endforeach
            </tbody>
    </div>
    </table>
@endsection