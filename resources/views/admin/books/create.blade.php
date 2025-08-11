@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-6 text-gray-800">Add Book</h2>

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

<form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data"
    class="bg-white p-6 rounded shadow-md space-y-6">
    @csrf

    <!-- Title -->
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Title</label>
        <input type="text" name="title"
            class="w-full rounded shadow-sm focus:ring-blue-500 focus:border-blue-500 border @error('field_name') border-red-500 @else border-gray-300 @enderror"

            value="{{ old('title') }}">
        @error('title')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Author -->
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Author</label>
        <input type="text" name="author"
            class="w-full border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('author') border-red-500 @enderror"
            value="{{ old('author') }}">
        @error('author')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Description -->
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
        <textarea name="description"
            class="w-full border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('description') border-red-500 @enderror"
            rows="4">{{ old('description') }}</textarea>
        @error('description')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Cover Image -->
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Cover Image</label>
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
            value="{{ old('price') }}">
        @error('price')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Availability -->
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Availability</label>
        <select name="is_available"
            class="w-full border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('is_available') border-red-500 @enderror">
            <option value="1" {{ old('is_available', '1') == '1' ? 'selected' : '' }}>Available</option>
            <option value="0" {{ old('is_available') == '0' ? 'selected' : '' }}>Unavailable</option>
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
            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
            @endforeach
        </select>
        @error('category_id')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <button
        class="px-6 py-2 bg-green-600 text-white font-semibold rounded hover:bg-green-700 transition duration-150">
        Add Book
    </button>
</form>
@endsection