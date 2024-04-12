
@extends('layouts.admin')

@section('content')
    <div class="container mt-3 mb-5 w-50">
        <h2 class="text-center">Add New Item</h2>

        <form class="mt-5" action="{{ route('admin.items.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4 has-validation">
                <label for="name" class="form-label fw-bold">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name') }}">

                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4 has-validation">
                <label class="description-box form-label fw-bold" for="description">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="3"
                    name="description">{{ old('description') }}</textarea>

                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-3">
                <label for="price" class="form-label badge text-dark p-2">Price</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">€</span>
                    <input required min="0"type="text"
                        class="form-control @error('price') is-invalid @enderror" style="max-height: 250px" id="price"
                        name="price" value="{{ old('price') }}">
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-4 has-validation">
                <label for="category" class="form-label fw-bold">Select category of your project:</label>
                <select class="form-select @error('category') is-invalid @enderror" name="category_id" id="category">
                    <option @selected(!old('category_id')) value="">No category</option>

                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach

                </select>

                @error('category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-4 has-validation">
                <p class="form-label fw-bold">Select the tags of your project:</p>
                
                <div class="d-flex flex-wrap">
                    @foreach ($tags as $tag)
                        <div class="form-check">
                            <input @checked(in_array($tag->id, old('tags', [])))
                                type="checkbox"
                                class="@error('tags') is-invalid @enderror" 
                                id="tag-{{ $tag->id }}"
                                value="{{ $tag->id }}" 
                                name="tags[]">
    
                            <label for="tag-{{ $tag->id }}"> {{ $tag->name }} </label>
                        </div>
                    @endforeach
                </div>

                @error('tags')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-4">
                <label for="image" class="form-label fw-bold">Image</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">

                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="m-2 mx-auto w-100">
                <img id="preview-img" alt=""
                    style="max-height: 250px">
            </div>

            <button class="btn btn-success" type="submit">Save</button>

        </form>
    </div>
@endsection

@section('scripts')
    @vite(['resources/js/image-preview.js'])
@endsection
