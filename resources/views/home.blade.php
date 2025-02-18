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
        <button class="scroll-button left" onclick="scrollLeft()">&lt;</button>
        <div class="book-list-wrapper" id="bookListWrapper">
            <div class="book-list">
                {{-- Include the books.index view here --}}
                @include('books.index', ['books' => $books])
            </div>
        </div>
        <button class="scroll-button right" onclick="scrollRight()">&gt;</button>
    </div>

    <script>
        // Scroll Left Function
function scrollLeft() {
    console.log("Scroll Left button clicked");
    const container = document.getElementById('bookListWrapper');
    container.scrollBy({
        left: -300, // Adjust this value to scroll by more or less
        behavior: 'smooth'
    });
}

// Scroll Right Function
function scrollRight() {
    console.log("Scroll Right button clicked");
    const container = document.getElementById('bookListWrapper');
    container.scrollBy({
        left: 300, // Adjust this value to scroll by more or less
        behavior: 'smooth'
    });
}

    </script>

@endsection
