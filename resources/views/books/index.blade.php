@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="searchbar">
        <div class="search">
            <input type="text" placeholder="Chercher un livre">
            <button type="button">Search</button>
        </div>
        <h1>Welcome to our library!</h1>
        <p>Discover our world of books, enjoy reading the best novels, and travel to another world.</p>
    </div>

    {{-- Include the About Us Section --}}
    @include('partials.about')

    <div class="book-section">
        <button class="scroll-button left">&lt;</button>
        <div class="book-list-wrapper">
            <div class="book-list">
                @foreach ($books as $book)
                    <div class="book-card">
                        <div class="book-image-container">
                            @if($book->image)
                                <img class="book-image" src="{{ asset('images/books/' . $book->image) }}" alt="{{ $book->titre }}">
                            @else
                                <img class="book-image" src="https://via.placeholder.com/150" alt="Image du livre">
                            @endif
                            <form action="{{ route('favorites.store', $book->id) }}" method="POST" class="favorite-form">
                                @csrf
                                    <button type="submit" class="favorite-icon">
                                        <i class="far fa-heart"></i>
                                    </button>
                            </form>

                        </div>
                        <div class="book-details">
                            <h5 class="card-title">{{ $book->titre }}</h5>
                            <p class="card-text">Auteur: {{ $book->auteur }}</p>
                            <p class="card-text">Genre: {{ $book->genre }}</p>
                            <p class="card-text">Prix: {{ number_format($book->prix, 2) }} MAD</p>
                        </div>
                        <div class="book-actions">
                            <button class="book-button favorite-button">Add to cart</button>
                        </div>
                        
                    </div>
                @endforeach
            </div>
        </div>
        <button class="scroll-button right">&gt;</button>
    </div>
@endsection







