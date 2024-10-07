@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
<div class="row">
    <div class="col-md-6 offset-md-3">
        <h1 class="mb-4">Edit User</h1>
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="user_name" class="form-label">User Name</label>
                <input type="text" name="user_name" id="user_name" class="form-control" value="{{ $user->name }}" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>

        <a href="{{ route('users.index') }}" class="btn btn-secondary mt-3">Back to Search</a>
    </div>
</div>
@endsection
