@extends('layouts.app')

@section('title', 'Modifier le livre')

@section('content')
<body>
    <div class="form-container">
        <h2>Modifier le livre</h2>

        <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label for="titre">Titre:</label>
            <input type="text" name="titre" id="titre" value="{{ old('titre', $book->titre) }}" required>

            <label for="auteur">Auteur:</label>
            <input type="text" name="auteur" id="auteur" value="{{ old('auteur', $book->auteur) }}" required>

            <label for="genre">Genre:</label>
            <input type="text" name="genre" id="genre" value="{{ old('genre', $book->genre) }}" required>

            <label for="prix">Prix (MAD):</label>
            <input type="number" name="prix" id="prix" value="{{ old('prix', $book->prix) }}" required>

            <label for="image">Image:</label>
            <input type="file" name="image" id="image">

            <button type="submit">Mettre à jour</button>
        </form>
    </div>
</body>
@endsection
