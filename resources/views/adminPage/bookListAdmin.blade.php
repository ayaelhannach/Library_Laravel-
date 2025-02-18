// resources/views/adminPage/bookListAdmin.blade.php
@extends('layouts.admin')

@section('title', 'Book List')

@section('content')
    <div class="searchbar">
        <div class="search">
            <input type="text" placeholder="Search a book">
            <button type="button">Search</button>
        </div>
        <h1>Manage Books</h1>
        <p>Here you can manage the books in the library, edit or delete them.</p>
    </div>

    <div class="book-section">
        <div class="book-list-wrapper">
            @if ($books->isEmpty())
                <p>No books found.</p>
            @else
                <div class="book-list">
                    @foreach ($books as $book)
                        <div class="book-card">
                            <div class="book-image-container">
                                @if ($book->image)
                                    <img class="book-image" src="{{ asset('images/books/' . $book->image) }}" alt="{{ $book->titre }}">
                                @else
                                    <img class="book-image" src="https://via.placeholder.com/150" alt="Book Image">
                                @endif
                            </div>
                            <div class="book-details">
                                <h5 class="card-title">{{ $book->titre }}</h5>
                                <p class="card-text">Author: {{ $book->auteur }}</p>
                                <p class="card-text">Genre: {{ $book->genre }}</p>
                                <p class="card-text">Price: {{ number_format($book->prix, 2) }} MAD</p>
                            </div>
                            <div class="book-actions">
                                <a href="{{ route('admin.editBook', $book->id) }}" class="book-button modify-button">Modify</a>
                                <form action="{{ route('admin.deleteBook', $book->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="book-button delete-button">Delete</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif


            
        </div>

    </div>
@endsection
