@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        Users Table
        <a href="{{route('users.create')}}" class=" btn btn-primary float-end">
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
                <th>Username</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->username?$value->username:"" }}</td>
                <td>{{ $value->email }}</td>
                <td>
                    <span class="action" style="display: flex; gap:5px">
                <a class="btn btn-primary"href="{{'users/'.$value->id}}" >Edit</a>
                <form method="POST" action="{{ route('users.delete', ['id' => $value->id]) }}">
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
</div>
</div></div>
@endsection

