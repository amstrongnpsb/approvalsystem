@extends('layouts.main')
@section('container')
<div class="container-fluid min-vh-100 p-3 text-light w-50 position-relative font-monospace ">
    <div class="w-50 m-auto bg-light h-80 text-dark p-3 rounded-2 position-absolute top-50 start-50 translate-middle">
        <h3 class="fw-bold mb-3">{{ $title }}</h3>
        <form action="/user" method="POST">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                    name="username" placeholder="username" value="{{ old('username') }}" autofocus required>
                <label for="username">Username</label>
                @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="name"
                    value="{{ old('name') }}" required">
                <label for="name">Name</label>
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating mb-4">
                <input type="text" class="form-control" id="nik" name="nik" placeholder="nik" value="{{ old('nik') }}"
                    required>
                <label for="nik">NIK</label>
                @error('nik')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select class="form-select" name="role">
                    @foreach ($roles as $role)
                    @if(old('role') == $role)
                    <option value="{{ $role }}" selected>{{ $role }}</option>
                    @else
                    <option value="{{ $role }}">{{ $role }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="example@gmail.com"
                    value=" {{ old('email') }}" required">
                <label for="email">Email address</label>
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating mb-4">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                    required>
                <label for="password">Password</label>
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-dark mb-4 ">Create</button>
        </form>
    </div>
    @endsection