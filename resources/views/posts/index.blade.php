@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{route('posts.create')}}" class=" btn btn-primary float-end">
Add New
        </a>

    </div>
<div class="card-body">
 @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
<div class="table-responsive row">
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Author</th>
                <th>Title</th>
                <th>Body</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $count=0;
            @endphp
            @foreach($posts as $value)
            <tr>
                <td>{{ $count+1 }}</td>
                <td>{{ $value->user->name}}</td>
                <td>{{ $value->title }}</td>
                <td>{{ $value->body}}</td>
                <td>
                    <span class="action" style="display: flex; gap:5px">
                <a class="btn btn-primary"href="{{ route('posts.edit', ['id' => $value->id]) }}" >Edit</a>
                <form method="POST" action="{{ route('posts.delete', ['id' => $value->id]) }}">
                    @csrf
                    @method('DELETE')
                <button class="btn btn-danger btn-xs" >Del</button>
                </form>
                    </span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @php

    @endphp

        <div class="pagination">
            {!!$posts->links()!!}
        </div>


</div>
</div></div>
@endsection

