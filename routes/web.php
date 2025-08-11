<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\BookController as AdminBookController;
use App\Http\Controllers\Public\BookController as PublicBookController;
use App\Models\Book;
use App\Models\Category;

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard', [
            'totalBooks' => Book::count(),
            'availableBooks' => Book::where('is_available', 1)->count(),
            'totalCategories' => Category::count(),
        ]);
    })->name('admin.dashboard');

    Route::resource('books', AdminBookController::class)->names('admin.books');
});

Route::get('/', [PublicBookController::class, 'home'])->name('home');
Route::get('/books', [PublicBookController::class, 'index'])->name('books.index');
Route::get('/books/{book}', [PublicBookController::class, 'show'])->name('books.show');

Route::middleware('auth')->group(function () {
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
