@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center mb-4">
        <h2 class="text-3xl font-bold text-indigo-800 mb-6">📚 Welcome to Our Book Store</h2>
        <p class="lead">Explore our latest collection of books!</p>
    </div>

    @if($weather)
    <div class="alert alert-info d-flex align-items-center justify-content-between">
        <div>
            <strong>🌤 Weather in {{ $weather['city'] }}:</strong>
            {{ $weather['temperature'] }}°C, {{ ucfirst($weather['description']) }}
        </div>
    </div>
    @endif

    <h4 class="mb-3  py-3 font-semibold text-xl text-blue-800 ">Latest Books :</h4>
    <div class="row">
        @forelse($latestBooks as $book)
        <div class="col-md-3 mb-4">
            <div class="card h-100 shadow-md p-5 ">
                @if($book->cover_image)
                <img src="{{ asset('storage/' . $book->cover_image) }}" class="card-img-top" alt="{{ $book->title }}">
                @else
                <img src="https://via.placeholder.com/300x400?text=No+Image" class="card-img-top" alt="No image">
                @endif
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title  py-3 font-semibold text-lg text-gray-800">{{ $book->title }}</h5>
                    <p class="card-text text-muted">By {{ $book->author }}</p>
                    <p class="card-text fw-bold mb-2">₹{{ number_format($book->price, 2) }}</p>
                    <a href="{{ route('books.show', $book) }}" class="btn btn-primary px-3 py-1  rounded-md bg-blue-200 shadow-md ">View Details</a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <p>No books found.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection