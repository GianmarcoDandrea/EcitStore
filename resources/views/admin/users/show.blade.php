@extends('layouts.admin')

@section('content')
    <div class="container mt-3 mb-5">
        <h2 class="fs-1 mb-3">{{ $user->name }} {{ $user->surname }}</h2>



        <ul>
            <li class="mt-2 fs-5">
                <span class="fw-bold ">Email:
                </span>{{ $user->email }}
            </li>

            <li class="mt-2 fs-5">
                <span class="fw-bold ">Type: </span> {{ $user->type }}
            </li>

            <li class="mt-2 fs-5">
                <span class="fw-bold">Added: </span> {{ date('d-m-Y', strtotime($user->created_at)) }}
            </li>
        </ul>


        <div class=" d-flex gap-3">
            <a href="{{ route('admin.users.edit', ['user' => $user->id]) }}" class="btn btn-warning">Edit User</a>

            <form action="{{ route('admin.users.destroy', ['user' => $user->id]) }}" "#" action=class="d-inline-block"
                method="POST">

                @csrf
                @method('DELETE')

                <button type="button" class="btn btn-danger btn-delete" data-bs-toggle="modal"
                    data-bs-target="#delete-modal" data-title="{{ $user->name }}">
                    Delete
                </button>
                @include('admin.users.partials.delete-modal')

            </form>
        </div>
    </div>
@endsection

@section('scripts')
    @vite(['resources/js/image-preview.js'])
@endsection
