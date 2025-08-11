@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-6 text-gray-800">Edit Book</h2>

@if(session('success'))
<div class="mb-4 px-4 py-2 bg-green-100 text-green-800 border border-green-300 rounded">
    {{ session('success') }}
</div>
@endif

@if($errors->any())
<div class="mb-4 px-4 py-2 bg-red-100 text-red-800 border border-red-300 rounded">
    <strong class="block mb-1">There were some issues:</strong>
    <ul class="list-disc list-inside space-y-1">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('admin.books.update', $book) }}" method="POST" enctype="multipart/form-data"
    class="bg-white p-6 rounded shadow-md space-y-6">
    @csrf
    @method('PUT')

    <!-- Title -->
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Title</label>
        <input type="text" name="title"
            class="w-full border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('title') border-red-500 @enderror"
            value="{{ old('title', $book->title) }}">
        @error('title')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Author -->
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Author</label>
        <input type="text" name="author"
            class="w-full border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('author') border-red-500 @enderror"
            value="{{ old('author', $book->author) }}">
        @error('author')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Description -->
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
        <textarea name="description" rows="4"
            class="w-full border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('description') border-red-500 @enderror">{{ old('description', $book->description) }}</textarea>
        @error('description')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Current Cover -->
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Current Cover</label>
        @if($book->cover_image)
        <img src="{{ asset('storage/' . $book->cover_image) }}" class="w-20 h-auto mb-2 rounded">
        @else
        <p class="text-gray-500">No image uploaded.</p>
        @endif
    </div>

    <!-- Cover Image -->
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Change Cover Image</label>
        <input type="file" name="cover_image"
            class="w-full border-gray-300 rounded shadow-sm @error('cover_image') border-red-500 @enderror">
        @error('cover_image')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Price -->
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Price</label>
        <input type="number" step="0.01" name="price"
            class="w-full border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('price') border-red-500 @enderror"
            value="{{ old('price', $book->price) }}">
        @error('price')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Availability -->
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Availability</label>
        <select name="is_available"
            class="w-full border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('is_available') border-red-500 @enderror">
            <option value="1" {{ old('is_available', $book->is_available) == 1 ? 'selected' : '' }}>Available</option>
            <option value="0" {{ old('is_available', $book->is_available) == 0 ? 'selected' : '' }}>Unavailable</option>
        </select>
        @error('is_available')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Category -->
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Category</label>
        <select name="category_id"
            class="w-full border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('category_id') border-red-500 @enderror">
            @foreach($categories as $category)
            <option value="{{ $category->id }}"
                {{ old('category_id', $book->category_id) == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
            @endforeach
        </select>
        @error('category_id')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <button
        class="px-6 py-2 bg-blue-600 text-white font-semibold rounded hover:bg-blue-700 transition duration-150">
        Update Book
    </button>
</form>
@endsection