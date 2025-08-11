@extends('layouts.app')

@section('content')
<div class="container">
    <form method="GET" action="{{ route('books.index') }}" class="mb-6 flex gap-2">
        <input type="text" name="q" value="{{ request('q') }}"
            placeholder="Search by title or author"
            class="flex-1 border-gray-300 rounded shadow-sm focus:ring-red-500 focus:border-red-500 px-3 py-2">
        <button type="submit"
            class="bg-red-600 text-white px-4 py-2 rounded shadow hover:bg-red-700 transition">
            Search
        </button>
    </form>

    <h2 class="mb-4 font-medium text-xl  text-blue-800 ">All Books :</h2>

    @if($books->count())
    <div class="row">
        @foreach($books as $book)
        <div class="col-md-3 mb-4">
            <div class="card h-100">
                @if($book->cover_image)
                <img src="{{ asset('storage/' . $book->cover_image) }}" class="card-img-top" alt="{{ $book->title }}">
                @else
                <img src="https://via.placeholder.com/150x200?text=No+Image" class="card-img-top" alt="No image">
                @endif

                <div class="card-body d-flex flex-column shadow-sm p-4">
                    <h5 class="card-title">{{ $book->title }}</h5>
                    <p class="card-text mb-1">₹{{ number_format($book->price, 2) }}</p>
                    <a href="{{ route('books.show', $book) }}" class="btn btn-outline-primary mt-auto shadow-md bg-blue-200 px-3 py-1 rounded-md  ">View</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center">
        {{ $books->appends(['q' => request('q')])->links() }}
    </div>
    @else
    <div class="alert alert-info">No books available right now.</div>
    @endif
</div>
@endsection