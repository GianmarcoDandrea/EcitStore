@extends('layouts.app')
@section('content')
    <div class="container mt-3 mb-5 d-flex flex-column align-items-center">
        <h2 class="fs-1 mb-3">{{ $item->title }}</h2>

        @if ($item->image)
            <div class="w-25">
                <img src="{{ asset('storage/' . $item->image) }}" alt="">
            </div>
        @else
            <div class="w-25">
                <img src="{{ Vite::asset('resources/img/image_not_available.jpg') }}" alt="">
            </div>
        @endif

        <hr class="w-50">

        <ul>
            <li class="mt-5 fs-5">
                <strong>Tags:</strong>
                @foreach ($item->tags as $tag)
                    <span class="badge" style="background-color: #359ed0"> {{ ucfirst($tag->name) }}</span>
                @endforeach
            </li>

            <li class="mt-2 fs-5">
                <span class="fw-bold ">Category:
                </span>{{ $item->category ? $item->category->name : 'No category for this item' }}
            </li>

            <li class="mt-2 fs-5">
                <span class="fw-bold ">Description: </span> {{ $item->description }}
            </li>

            <li class="mt-2 fs-5">
                <span class="fw-bold ">Price: </span> {{ $item->price }} €
            </li>

        </ul>

    </div>
@endsection

@section('scripts')
    @vite(['resources/js/image-preview.js'])
@endsection
