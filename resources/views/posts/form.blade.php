
@extends('layouts.app')

@section('content')
<div class=" col-md-8">
<div class="card">
<div class="card-header">
   @if (isset($post))
   <h3 class="card-title">Update post</h3>
   @else
   <h3 class="card-title">New post</h3>
   @endif
</div>
<div class="card-body">
<form method="POST" action="{{ isset($post) ? route('posts.edit', ['id'=>$post->id]) : route('posts.store') }}">
    @csrf
    @if(isset($post))
        @method('PUT')
        @else
        @method('post')
    @endif
 @if(session('success'))
    <div class="alert alert-success my-5">{{ session('success') }}</div>
@endif

                    <div class="form-group mb-3">
                        <label for="tittle">Title</label>
                        <input id="tittle" class="form-control" type="text" name="title" value="{{ isset($post) ? $post->title : old('title') }}">
                        @error('title') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="body">Body</label>
                        <textarea id="body" class="form-control" type="text" name="body" >{{ isset($post) ? $post->body : old('body') }}</textarea>
                        @error('body') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>


                    <button type="submit" class="btn btn-primary float-end mx-5 my-5">Submit</button>
                </form>
</div></div>
@endsection

