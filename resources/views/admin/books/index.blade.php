@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-6 text-gray-800">Books</h2>

<a href="{{ route('admin.books.create') }}"
    class="inline-block px-4 py-2 mb-4 bg-green-600 text-white rounded hover:bg-green-700 transition">
    Add New Book
</a>

@if(session('success'))
<div class="mb-4 px-4 py-2 bg-green-100 text-green-800 border border-green-300 rounded">
    {{ session('success') }}
</div>
@endif

<div class="overflow-x-auto bg-white shadow-md rounded">
    <table class="min-w-full table-auto border border-gray-200">
        <thead class="bg-gray-100 text-left text-gray-700 font-medium">
            <tr>
                <th class="px-4 py-2 border-b">Cover</th>
                <th class="px-4 py-2 border-b">Title</th>
                <th class="px-4 py-2 border-b">Author</th>
                <th class="px-4 py-2 border-b">Price</th>
                <th class="px-4 py-2 border-b">Available</th>
                <th class="px-4 py-2 border-b">Category</th>
                <th class="px-4 py-2 border-b">Actions</th>
            </tr>
        </thead>
        <tbody class="text-sm text-gray-700">
            @forelse($books as $book)
            <tr class="hover:bg-gray-50">
                <td class="px-4 py-2 border-b">
                    @if($book->cover_image)
                    <img src="{{ asset('storage/' . $book->cover_image) }}" class="w-12 h-auto rounded">
                    @else
                    <span class="text-gray-500">No image</span>
                    @endif
                </td>
                <td class="px-4 py-2 border-b ">{{ $book->title }}</td>
                <td class="px-4 py-2 border-b">{{ $book->author }}</td>
                <td class="px-4 py-2 border-b">₹{{ $book->price }}</td>
                <td class="px-4 py-2 border-b">
                    <span class="inline-block px-2 py-1 rounded text-white text-xs
                        {{ $book->is_available ? 'bg-green-600' : 'bg-gray-500' }}">
                        {{ $book->is_available ? 'Yes' : 'No' }}
                    </span>
                </td>
                <td class="px-4 py-2 border-b">{{ $book->category->name ?? '-' }}</td>
                <td class="px-4 py-2 border-b space-x-2 whitespace-nowrap">
                    <a href="{{ route('admin.books.edit', $book) }}"
                        class="inline-block px-3 py-1 text-sm border border-blue-600 text-blue-600 rounded hover:bg-blue-600 hover:text-white transition">
                        Edit
                    </a>
                    <form action="{{ route('admin.books.destroy', $book) }}" method="POST" class="inline"
                        onsubmit="return confirm('Delete this book?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="inline-block px-3 py-1 text-sm border border-red-600 text-red-600 rounded hover:bg-red-600 hover:text-white transition">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center text-gray-500 py-4">No books found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-6">
    {{ $books->links() }}
</div>
@endsection