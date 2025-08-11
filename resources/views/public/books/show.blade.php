@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <!-- Book Cover -->
        <div class="col-md-4 mb-4">
            @if($book->cover_image)
            <img src="{{ asset('storage/' . $book->cover_image) }}" class="img-fluid rounded w-5 shadow" alt="{{ $book->title }}">
            @else
            <img src="https://via.placeholder.com/300x400?text=No+Image" class="img-fluid rounded shadow" alt="No image">
            @endif
        </div>

        <!-- Book Info -->
        <div class="col-md-8 bg-white p-6 rounded shadow space-y-4">
            <h2 class="text-2xl font-bold text-blue-800">{{ $book->title }}</h2>
            <p><strong>Author:</strong> {{ $book->author }}</p>
            <p><strong>Category:</strong> {{ $book->category->name ?? 'Uncategorized' }}</p>
            <p><strong>Price:</strong> ₹{{ number_format($book->price, 2) }}</p>
            <p><strong>Status:</strong>
                <span class="badge {{ $book->is_available ? 'bg-success' : 'bg-danger' }}">
                    {{ $book->is_available ? 'Available' : 'Unavailable' }}
                </span>
            </p>

            <hr>
            <div>
                <p>{{ $book->description }}</p>
            </div>

            <a href="{{ route('books.index') }}" class=" btn btn-secondary mt-3 inline-block mb-4 px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded">← Back to Listing</a>
        </div>
    </div>
</div>
@endsection