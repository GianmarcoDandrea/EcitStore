@extends('layouts.admin')

@section('content')
<div class="wrap" >
    <div class="container" >
        <div class="row justify-content-center">
            <div class="col-md-8 mt-4">
                <div class="card">
                    <div class="card-header text-light text-center fw-bold" style="background-color: #1e9bd8">{{ __('Dashboard') }}</div>

                    <div class="card-body text-center text-dark" >
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <strong>{{ __('You are logged in!') }}</strong>

                        <div class="card text-center mt-3">
                            <div class="card-header text-light fw-bold" style="background-color: #1e9bd8">
                                Your Profile
                            </div>
                            <div class="card-body text-dark" >
                                <h5 class="card-title text-dark mb-3"> Your Info</h5>
                                <p class="card-text">Name: {{ auth()->user()->name }}</p>
                                <p>Last Name: {{ auth()->user()->surname }}</p>
                                <p>Email: {{ auth()->user()->email }}</p>
                                
                                <hr class="hr">
                                <div class="d-flex justify-content-center">
                                    <div class="mb-3 mx-2 card card-custom p-3 w-25">
                                        <a class="row g-0 text-decoration-none" href="{{ route('admin.items.index') }}">
                                            <div class="col-md-12 text-center">
                                                <i class="fa-solid fa-object-group fa-style fa-lg fa-fw text-dark"></i>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="card-body">
                                                    <h5 class=" text-dark fs-6"><strong>Items</strong></h5>
                                                    <p class="card-text"><small class="text-body-secondary">List of all your
                                                            items.</small></p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="mb-3 mx-2 card card-custom p-3 w-25">
                                        <a class="row g-0 text-decoration-none" href="{{ route('admin.tags.index') }}">
                                            <div class="col-md-12 text-center">
                                                <i class="fa-solid fa-tags fa-style fa-lg fa-fw text-dark"></i>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="card-body">
                                                    <h5 class=" text-dark fs-6"><strong>Tags</strong></h5>
                                                    <p class="card-text"><small class="text-body-secondary">List of all your tags.</small></p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="mb-3 mx-2 card card-custom p-3 w-25">
                                        <a class="row g-0 text-decoration-none" href="{{ route('admin.categories.index') }}">
                                            <div class="col-md-12 text-center">
                                                <i class="fa-solid fa-layer-group fa-style fa-lg fa-fw text-dark"></i>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="card-body">
                                                    <h5 class=" text-dark fs-6"><strong>Categories</strong></h5>
                                                    <p class="card-text"><small class="text-body-secondary">List of all your categories.</small></p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="mb-3 mx-2 card card-custom p-3 w-25">
                                        <a class="row g-0 text-decoration-none" href="{{ route('admin.users.index') }}">
                                            <div class="col-md-12 text-center">
                                                <i class="fa-solid fa-users fa-style fa-lg fa-fw text-dark"></i>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="card-body">
                                                    <h5 class=" text-dark fs-6"><strong>Users</strong></h5>
                                                    <p class="card-text"><small class="text-body-secondary">List of all users.</small></p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    @vite('resources/js/dboard.js')
@endsection