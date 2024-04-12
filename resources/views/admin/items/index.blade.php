@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h2>List of Items</h2>

        <div class="text-end">
            <a class="btn btn-success" href="{{ route('admin.items.create') }}">
                <i class="fa-regular fa-plus"></i>
            </a>
        </div>

        @if (Session::has('message'))
            <div class="alert alert-success w-50 mx-auto">
                {{ Session::get('message') }}
            </div>
        @endif


        @if (count($items) > 0)
            <table class="table table-striped mt-5 w-100">
                <thead>
                    <tr>
                        <th scope="col" class="title-column fs-5">Name</th>
                        <th scope="col" class="description-column fs-5">Description</th>
                        <th scope="col" class="price-column fs-5">Price</th>
                        <th scope="col" class="action-column fs-5">Actions</th>
                    </tr>
                </thead>
                <tbody class="w-100">
                    @foreach ($items as $item)
                        <tr>
                            <td scope="row">{{ $item->name }}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->price }} €</td>
                            <td>
                                <a class="btn btn-success" href="{{ route('admin.items.show', ['item' => $item->id]) }}">
                                    Details
                                </a>

                                <form action="{{ route('admin.items.destroy', ['item' => $item->id]) }}"
                                    class="d-inline-block" method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-modal"">
                                        Delete
                                    </button>

                                    @include('admin.items.partials.delete-modal')
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-danger w-50 mx-auto">
                There's nothing here yet. Add your first item.
            </div>
        @endif
    </div>

@endsection

@section('scripts')
    @vite(['resources/js/image-preview.js'])
@endsection
