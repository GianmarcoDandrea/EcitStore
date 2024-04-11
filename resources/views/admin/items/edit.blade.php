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
                <label class="description-box form-label fw-bold" for="description" >Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="3"
                    name="description">{{ old('description', $item->description) }}</textarea>

                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
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

                @foreach ($tags as $tag)
                    <div class="form-check">
                        <input @checked($errors->any() ? in_array($tags->id, old('roles', [])) : $item->tags->contains($tag))
                            type="checkbox"
                            class="@error('technologies') is-invalid @enderror" 
                            id="tag-{{ $tag->id }}"
                            value="{{ $tag->id }}" 
                            name="technologies[]">

                        <label for="tag-{{ $tag->id }}"> {{ $tag->name }} </label>
                    </div>
                @endforeach


                @error('tags')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="fw-bold">Image</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>

            <div class="mb-2 mx-auto w-100">
                <img id="preview-img" src="{{ asset('storage/' . $item->image) }}" alt="">
            </div>

            <button class="btn btn-success" type="submit">Save</button>

        </form>
    </div>
@endsection

@section('scripts')
    @vite(['resources/js/image-preview.js'])
@endsection
