
@extends('layouts.app')

@section('content')
<div class=" col-md-8">
<div class="card">
<div class="card-header">
   @if (isset($user))
   <h3 class="card-title">Update User</h3>
   @else
   <h3 class="card-title">New User</h3>
   @endif
</div>
<div class="card-body">
<form method="POST" action="{{ isset($user) ? route('users.update', $user->id) : route('users.store') }}">
    @csrf
    @if(isset($user))
        @method('PUT')
        @else
        @method('post')
    @endif
 @if(session('success'))
    <div class="alert alert-success my-5">{{ session('success') }}</div>
@endif

                    <div class="form-group mb-3">
                        <label for="name">Name</label>
                        <input id="name" class="form-control" type="text" name="name" value="{{ isset($user) ? $user->name : old('name') }}">
                        @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group mb-3">
                        <label  for="username">Username</label>
                        <input id="username" class="form-control" type="text" name="username" value="{{ isset($user) ? $user->username : old('username') }}">
                        @error('username') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="email">Email address</label>
                        <input id="email" class="form-control" type="text" name="email" value="{{ isset($user) ? $user->username : old('email') }}">
                        @error('email') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="password">Password</label>
                        <input id="password"class="form-control" type="text" name="password" value="{{old('password')}}">
                        @error('password') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="confirmPassword">Confirm Password</label>
                        <input id="confirmPassword" class="form-control" type="text" name="passwordConfirm" value="">
                        @error('password') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>


                    <button type="submit" class="btn btn-primary float-end mx-5 my-5">Submit</button>
                </form>
</div></div>
@endsection

