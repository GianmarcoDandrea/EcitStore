@extends('layouts.admin')

@section('content')
    <div class="container w-50 mt-3 mb-5">
        <h2 class="text-center">Edit User</h2>


        <form class="mt-5" action="{{ route('admin.users.update', ['user' => $user->id]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4 has-validation">
                <label for="name" class="form-label fw-bold">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name', $user->name) }}">

                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4 has-validation">
                <label for="surname" class="form-label fw-bold">Last Name</label>
                <input type="text" class="form-control @error('surname') is-invalid @enderror" id="surname"
                    name="surname" value="{{ old('surname', $user->surname) }}">

                @error('surname')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4 has-validation">
                <label for="email" class="form-label fw-bold">Last Name</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                    name="email" value="{{ old('email', $user->email) }}">

                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-success" type="submit">Save</button>

        </form>
    </div>
@endsection

@section('scripts')
    @vite(['resources/js/image-preview.js'])
@endsection
