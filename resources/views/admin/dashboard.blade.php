@extends('layouts.app')

@section('content')
<div class="container py-5">
    <!-- Welcome Section -->
    <div class="text-center mb-5">
        <h1 class="fw-bold text-danger mb-3">📚 Admin Dashboard</h1>
        <p class="fs-5 text-muted">
            Welcome back, <span class="fw-bold text-dark">{{ Auth::user()->name }}</span>!
            You have full control to manage the bookstore.
        </p>
    </div>

    <!-- Action Card -->
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-body text-center py-5">
                    <h4 class="mb-4">Manage Your Books Collection</h4>
                    <a href="{{ route('admin.books.index') }}"
                        class="btn btn-lg btn-danger px-5 py-3 fw-bold rounded-md text-white bg-purple-500 shadow">
                        📖 Manage Books
                    </a>
                </div>
            </div>
        </div>
    </div>

    @if(session('status'))
    <div class="alert alert-success mt-5 text-center shadow-sm">
        {{ session('status') }}
    </div>
    @endif
</div>
@endsection