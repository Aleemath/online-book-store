<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Services\WeatherService;
use Illuminate\Http\Request;




class BookController extends Controller
{
    public function home(WeatherService $weatherService)
    {
        $latestBooks = Book::latest()->take(4)->get();
        $weather = $weatherService->getWeather('Kozhikode');
        return view('public.home', compact('latestBooks', 'weather'));
    }

    public function index(Request $request)
    {
        $query = Book::query();

        if ($request->filled('q')) {
            $search = $request->input('q');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('author', 'like', "%{$search}%");
            });
        }
        $books = $query->latest()->paginate(12)->appends(['q' => $request->q]);
        return view('public.books.index', compact('books'));
    }

    public function show(Book $book)
    {
        return view('public.books.show', compact('book'));
    }
}
