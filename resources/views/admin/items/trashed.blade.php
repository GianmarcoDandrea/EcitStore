@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h2>List of Deleted Items</h2>

        @if (Session::has('message'))
            <div class="alert alert-success w-50 mx-auto">
                {{ Session::get('message') }}
            </div>
        @endif

    </div>


    @if (empty($items))
        <div class="alert alert-warning w-50 mx-auto mt-5">
            There's no deleted item
        </div>
    @else
        <table class="table table-striped mt-5 w-100">
            <thead>
                <tr>
                    <th scope="col" class="title-column">Name</th>
                    <th scope="col" class="description-column">Description</th>
                    <th scope="col" class="price-column">Price</th>
                    <th scope="col" class="action-column">Actions</th>
                </tr>
            </thead>
            <tbody class="w-100">
                @foreach ($items as $item)
                    <tr>
                        <td scope="row">{{ $item->name }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->price }} €</td>
                        <td>
                            <a class="btn btn-success" href="{{ route('admin.restore', ['item' => $item->id]) }}">
                                Restore
                            </a>

                            <form action="{{ route('admin.delete', ['item' => $item->id]) }}" class="d-inline-block"
                                method="POST">

                                @csrf
                                @method('DELETE')

                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-modal" data-title="{{ $item->name }}">
                                    Delete
                                </button>

                                @include('admin.items.partials.delete-modal')

                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    </div>

@endsection
