
@extends('layouts.admin')

@section('content')
    <div class="container mt-3 mb-5">
        <h2 class="fs-1 mb-3">{{ $item->title }}</h2>

        @if ($item->image)
            <div>
                <img src="{{ asset('storage/' . $item->image) }}" alt="">
            </div>
        @else
            <div>
                <img src="{{ Vite::asset('resources/img/image_not_available.jpg') }}" alt="">
            </div>
        @endif

        <hr>

        <ul>
            <li class="mt-5 fs-5">
                <span class="fw-bold ">Tags:
                </span>
                @foreach ( $item->tags as $tag)
                <span class="badge bg-light text-dark fs-5" > {{ $tag->name }} </span>
           
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
                <span class="fw-bold">Added: </span> {{ date('d-m-Y', strtotime($item->created_at)) }}
            </li>
        </ul>


        <a href="#" class="btn btn-warning">Edit Your Item
        </a>

        <form action="#" class="d-inline-block"
            method="POST">

            @csrf
            @method('DELETE')

            <button class="btn btn-danger btn-delete" type="submit" data-title="{{ $item->title }}">
                Delete
            </button>

        </form>
    </div>

    @include('partials.delete-modal')
@endsection

@section('scripts')
    @vite(['resources/js/image-preview.js'])
@endsection
