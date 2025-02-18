@extends('layouts.app')

@section('title', 'Mes Favoris')

@section('content')
    <h1>Mes Favoris</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($favorites->isEmpty())
        <p>Aucun livre ajouté aux favoris pour le moment.</p>
    @else
        <div class="book-list">
            @foreach ($favorites as $favorite)
                <div class="book-card">
                        <div class="book-image-container">
                            @if($favorite->book->image)
                                <img class="book-image" src="{{ asset('images/books/' . $favorite->book->image) }}" alt="{{ $favorite->titre }}">
                            @else
                                <img class="book-image" src="https://via.placeholder.com/150" alt="Image du livre">
                            @endif
                        </div>
                    <h5>{{ $favorite->book->titre }}</h5>
                    <p>Auteur: {{ $favorite->book->auteur }}</p>
                    <p>Genre: {{ $favorite->book->genre }}</p>

                    <form action="{{ route('favorites.destroy', $favorite->book->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="book-actions" style="margin-left:1px">
    <button type="submit" class="book-button favorite-button">Retirer des favoris</button>
</div>

                    </form>

                </div>
            @endforeach
        </div>
    @endif
@endsection

