@extends('layouts.admin')

@section('content')
    <div class="container w-50 mt-3 mb-5">
        <h2 class="text-center">Edit Your Item</h2>


        <form class="mt-5" action="{{ route('admin.items.update', ['item' => $item->id]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4 has-validation">
                <label for="name" class="form-label fw-bold">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name', $item->name) }}">

                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 has-validation">
                <label class="description-box form-label fw-bold" for="description">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="3"
                    name="description">{{ old('description', $item->description) }}</textarea>

                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="form-label badge text-dark p-2">Price:</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">€</span>
                    <input type="text" required min="0"
                        class="form-control @error('price') is-invalid
                    
                @enderror"
                        style="max-height: 250px" id="price" name="price" value="{{ old('price', $item->price) }}">
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 has-validation">
                <label for="type" class="fw-bold">Select category of your item:</label>
                <select class="form-select @error('category') is-invalid @enderror" name="category_id" id="category">
                    <option @selected(!old('category_id', $item->category_id)) value="">No category</option>
                    @foreach ($categories as $category)
                        <option @selected(old('category_id', $item->category_id) == $category->id) value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>


                @error('category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4 has-validation">
                <p class="form-label fw-bold">Select the tags of your item:</p>
                <div class="d-flex flex-wrap">
                    @foreach ($tags as $tag)
                        <div class="form-check">
                            <input @checked($errors->any() ? in_array($tag->id, old('tags', [])) : $item->tags->contains($tag)) type="checkbox" class="@error('tags') is-invalid @enderror"
                                id="tag-{{ $tag->id }}" value="{{ $tag->id }}" name="tags[]">

                            <label for="tag-{{ $tag->id }}"> {{ $tag->name }} </label>
                        </div>
                    @endforeach
                </div>


                @error('tags')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="fw-bold">Image</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>

            <div class="m-2 mx-auto w-100">
                <p class="fw-bold">Image preview:</p>
                <img id="preview-img" src="{{ asset('storage/' . $item->image) }}" alt=""
                    style="max-height: 250px">
            </div>

            <button class="btn btn-success" type="submit">Save</button>

        </form>
    </div>
@endsection

@section('scripts')
    @vite(['resources/js/image-preview.js'])
@endsection
