@extends('layouts.app')

@section('title', 'Post list')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Post list</h2>
    <a href="{{ route('posts.create') }}" class="btn btn-success">Add post</a>
</div>

@if($posts->isEmpty())
   
@else
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Slug</th>
                <th>Text</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->slug }}</td>
                <td>{{ $post->text }}</td>
                <td>
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-primary">Change</a>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" 
                                onclick="return confirm('Delete post?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
 
@endif
@endsection