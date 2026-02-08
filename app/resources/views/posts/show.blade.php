@extends('layouts.app')

@section('title', 'Post: ' . $post->slug)

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0">Post Details</h3>
            </div>
            <div class="card-body">
                <!-- Slug -->
                <div class="mb-4">
                    <label class="form-label fw-bold">Slug:</label>
                    <div class="p-2 border rounded">
                        {{ $post->slug }}
                    </div>
                </div>

                <!-- Text -->
                <div class="mb-4">
                    <label class="form-label fw-bold">Text:</label>
                    <div class="p-2 border rounded">
                        {{ $post->text }}
                    </div>
                </div>

                <!-- Back Button -->
                <div class="mt-3">
                    <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back to List</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection