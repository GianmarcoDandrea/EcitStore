@extends('layouts.admin')

@section('content')
    <div class=" w-75 mx-auto">


        <div class="d-flex justify-content-center mt-5">
            <form method="POST" action="{{ route('admin.users.store') }}" class="w-75">
                @csrf

                <div class="mb-4 row">
                    <label for="name" class="form-label fw-bold">Name</label>

                    <div>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="mb-4 row">
                    <label for="name" class="form-label fw-bold">Last Name</label>

                    <div>
                        <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror"
                            name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                        @error('surname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="mb-4 row">
                    <label for="name" class="form-label fw-bold">Email</label>

                    <div>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="mb-4 row">
                    <label for="name" class="form-label fw-bold">Password</label>

                    <div>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="mb-4 row">
                    <label for="name" class="form-label fw-bold">Confirm Password</label>

                    <div>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            required>
                    </div>
                </div>

                <div class="mb-4 row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Add User
                        </button>
                    </div>
                </div>
            </form>

        </div>
    @endsection
