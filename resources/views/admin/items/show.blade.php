@extends('layouts.admin')

@section('content')
    <div class="container mt-3 mb-5">
        <h2 class="fs-1 mb-3">{{ $item->name }}</h2>

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
                <span class="fw-bold ">Tags:
                </span>
                @foreach ($item->tags as $tag)
                    <span class="badge bg-light text-dark fs-5"> {{ $tag->name }} </span>
                @endforeach
            </li>

            <li class="mt-2 fs-5">
                <span class="fw-bold ">Category:
                </span>{{ ucfirst($item->category->name) }}
            </li>

            <li class="mt-2 fs-5">
                <span class="fw-bold ">Description: </span> {{ $item->description }}
            </li>

            <li class="mt-2 fs-5">
                <span class="fw-bold ">Price: </span> {{ $item->price }} €
            </li>

            <li class="mt-2 fs-5">
                <span class="fw-bold">Added: </span> {{ date('d-m-Y', strtotime($item->created_at)) }}
            </li>

            @if ($item->updated_at != $item->created_at)
                <li class="mt-2 fs-5">
                    <span class="fw-bold">Updated: </span> {{ date('d-m-Y', strtotime($item->updated_at)) }}
                </li>
            @endif
        </ul>


        <div class=" d-flex gap-3">
            <a href="{{ route('admin.items.edit', ['item' => $item->id]) }}" class="btn btn-warning">Edit Your Item</a>

            <form action="{{ route('admin.items.destroy', ['item' => $item->id]) }}" "#" action=class="d-inline-block"
                method="POST">

                @csrf
                @method('DELETE')

                <button type="button" class="btn btn-danger btn-delete" data-bs-toggle="modal" data-bs-target="#delete-modal" data-title="{{ $item->name }}">
                    Delete
                </button>
                @include('admin.items.partials.delete-modal')

            </form>
        </div>
    </div>
@endsection

@section('scripts')
    @vite(['resources/js/image-preview.js'])
@endsection
