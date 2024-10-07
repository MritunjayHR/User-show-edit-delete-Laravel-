@extends('layouts.app')

@section('title', 'Register User')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mb-4">Register User</h1>
            <form action="{{ route('users.store') }}" method="POST" class="p-4 bg-white rounded shadow">
                @csrf
                <div class="row mb-3">
                    <div class="col">
                        <label for="user_id" class="form-label">User ID:</label>
                        <input type="text" name="user_id" id="user_id" class="form-control" placeholder="Enter User ID" value="{{ old('user_id') }}">
                        @error('user_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="user_name" class="form-label">User Name:</label>
                        <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter User Name" value="{{ old('user_name') }}">
                        @error('user_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password">
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </div>
</div>
@endsection
