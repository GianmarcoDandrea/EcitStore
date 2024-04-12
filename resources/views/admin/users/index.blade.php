@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h2>List of Users</h2>

        <div class="text-end">
            <a class="btn btn-success" href="{{ route('admin.users.create') }}">
                <i class="fa-regular fa-plus"></i>
            </a>
        </div>

        @if (Session::has('message'))
            <div class="alert alert-success w-50 mx-auto">
                {{ Session::get('message') }}
            </div>
        @endif


        @if (count($users) > 0)
            <table class="table table-striped mt-5 w-100">
                <thead>
                    <tr>
                        <th scope="col" class="id-column fs-5"><strong>ID</strong></th>
                        <th scope="col" class="user-name-column fs-5">Name</th>
                        <th scope="col" class="surname-column fs-5">Last Name</th>
                        <th scope="col" class="surname-column fs-5">Email</th>
                        <th scope="col" class="action-column fs-5">Actions</th>
                    </tr>
                </thead>
                <tbody class="w-100">
                    @foreach ($users as $user)
                        <tr>
                            <td scope="row"><strong>{{ $user->id }}</strong></td>
                            <td scope="row">{{ $user->name }}</td>
                            <td>{{ $user->surname }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a class="btn btn-success" href="{{ route('admin.users.show', ['user' => $user->id]) }}">
                                    Details
                                </a>

                                <form action="{{ route('admin.users.destroy', ['user' => $user->id]) }}"
                                    class="d-inline-block" method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-modal" data-title="{{ $user->name }}">
                                        Delete
                                    </button>

                                    @include('admin.users.partials.delete-modal')
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-danger w-50 mx-auto">
                There's nothing here yet. Add your first user.
            </div>
        @endif
    </div>

@endsection

@section('scripts')
    @vite(['resources/js/image-preview.js'])
@endsection
