@extends('layouts.admin')

@section('content')
<div class="wrap" >
    <div class="container" >
        <div class="row justify-content-center">
            <div class="col-md-8 mt-4">
                <div class="card">
                    <div class="card-header text-center fw-bold">{{ __('Dashboard') }}</div>

                    <div class="card-body text-center text-dark" >
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <strong>{{ __('You are logged in!') }}</strong>

                        <div class="card text-center mt-3">
                            <div class="card-header fw-bold">
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
                                        <a class="row g-0 text-decoration-none" href="/">
                                            <div class="col-md-12 text-center">
                                                <i class="fa-solid fa-utensils fa-style fa-lg fa-fw text-dark"></i>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="card-body">
                                                    <h5 class=" text-dark"><strong>Items</strong></h5>
                                                    <p class="card-text"><small class="text-body-secondary">List of all your
                                                            items.</small></p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="mb-3 mx-2 card card-custom p-3 w-25">
                                        <a class="row g-0 text-decoration-none" href="/">
                                            <div class="col-md-12 text-center">
                                                <i class="fa-solid fa-receipt fa-style fa-lg fa-fw text-dark"></i>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="card-body">
                                                    <h5 class=" text-dark"><strong>Tags</strong></h5>
                                                    <p class="card-text"><small class="text-body-secondary">List of all your tags.</small></p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="mb-3 mx-2 card card-custom p-3 w-25">
                                        <a class="row g-0 text-decoration-none" href="/">
                                            <div class="col-md-12 text-center">
                                                <i class="fa-solid fa-chart-simple fa-style fa-lg fa-fw text-dark"></i>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="card-body">
                                                    <h5 class=" text-dark"><strong>Categories</strong></h5>
                                                    <p class="card-text"><small class="text-body-secondary">List of all your categories.</small></p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-body-secondary d-flex justify-content-center align-content-center " >
                                <button disabled class="btn btn-outline-secondary text-dark">
                                    Support
                                </button>
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