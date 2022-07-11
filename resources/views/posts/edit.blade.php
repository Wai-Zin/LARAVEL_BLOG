@extends('layouts.master')
{{-- @section('title',)
    Edit A post
@endsection --}}

@section ('title', 'Edit Post')

@section('content')

    <div class="card">
        <div class="card-header">
            <h1>Edit A Post</h1>
        </div>
        <div class="card-body">
            <form action="/posts/{{ $post -> id }}" method="POST">

                 @csrf
                 @method('PUT')
                <div>
                    <label class="form-label">Post Title</label>
                    <input class="form-control" type="text" name="title" value= "{{$post->title}}">
                    @error('title')
                    <div style="color:red">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label class="form-label">Post Body</label>
                    <textarea class="form-control" rows="8" name="body">{{ $post -> body }}</textarea>

                    @error('body')
                    <div style="color:red">{{ $message }}</div>
                    @enderror
                </div>


                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-outline-info">Update</button>
                        <a href="/posts" class="btn btn-outline-secondary">Back</a>
                    </div>


            </form>
        </div>
    </div>

@endsection



