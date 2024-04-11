@extends('layouts.app')
@section('content')
    <div class="jumbotron p-3 mb-4" style="background-color: #359ed0">
        <div class="container py-5">
            <h1 class="display-5 text-light fw-bold">
                Welcome to Ecit Store
            </h1>
        </div>
    </div>

    <div class="container" style="width: 85%">
        <h2 class="text-center pb-5" style="color:#359ed0; font-size: 3rem"> <strong>Our Products</strong></h2>
        <div class="d-flex flex-wrap justify-content-center gap-3">
            @foreach ($items as $item)
                <div class="card" style="width: 18rem;" style="width: 20%">
                    @if ($item->image)
                        <div class="w-25">
                            <img src="{{ asset('storage/' . $item->image) }}" alt="">
                        </div>
                    @else
                        <div>
                            <img src="{{ Vite::asset('resources/img/image_not_available.jpg') }}" alt="">
                        </div>
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ ucfirst($item->name) }}</h5>
                        <p class="card-text">{{ ucfirst($item->description) }}</p>
                        <p class="card-text">
                        <p class="card-text"> <strong>Price</strong> {{ $item->price }} €</p>
                        <p class="card-text"> <strong>Tag</strong>:
                            @foreach ($item->tags as $tag)
                                <span class="badge" style="background-color: #359ed0"> {{ ucfirst($tag->name) }}</span>
                            @endforeach
                        </p>
                        <a href="{{ route('show', $item->id) }}" class="btn text-light"
                            style="background-color: #359ed0">Details</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
