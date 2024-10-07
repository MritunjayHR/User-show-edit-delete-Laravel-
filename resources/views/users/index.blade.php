@extends('layouts.app')

@section('title', 'User Search and Registration')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mb-4 text-center">Search Users</h1>
            <form action="{{ route('users.search') }}" method="POST" class="mb-5 p-4 bg-white rounded shadow">
                @csrf
                <div class="row mb-3">
                    <div class="col">
                        <label for="user_id" class="form-label">User ID:</label>
                        <input type="text" name="user_id" id="user_id" class="form-control" placeholder="Enter User ID">
                    </div>
                    <div class="col">
                        <label for="user_name" class="form-label">User Name:</label>
                        <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter User Name">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if(isset($users) && $users->count() > 0)
                <h2 class="text-center">All Users</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>User Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->user_id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-danger text-center">No users found.</p>
            @endif
            <a href="{{ route('users.create') }}" class="btn btn-success mt-3">Create New User</a>
        </div>
    </div>
</div>
@endsection
