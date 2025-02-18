<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Livre</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/addBook.css') }}">
</head>
<body style="background: lightgray">
    <div class="add-book-container">
        <h2 class="form-title">Ajouter un Livre</h2>
        <form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data" class="add-book-form">
            @csrf
            <div class="form-group">
                <label class="font-weight-bold">Titre</label>
                <input type="text" class="form-control @error('titre') is-invalid @enderror" name="titre" value="{{ old('titre') }}" placeholder="Entrez le titre du livre">
                @error('titre')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Auteur</label>
                <input type="text" class="form-control @error('auteur') is-invalid @enderror" name="auteur" value="{{ old('auteur') }}" placeholder="Entrez l'auteur du livre">
                @error('auteur')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Genre</label>
                <input type="text" class="form-control @error('genre') is-invalid @enderror" name="genre" value="{{ old('genre') }}" placeholder="Entrez le genre du livre">
                @error('genre')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Prix</label>
                <input type="text" class="form-control @error('prix') is-invalid @enderror" name="prix" value="{{ old('prix') }}" placeholder="Entrez le prix du livre">
                @error('prix')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Image</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                @error('image')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-buttons">
                <button type="submit" class="btn-submit">Enregistrer</button>
                <button type="button" class="btn-cancel" onclick="window.location.href='{{ route('admin.books') }}'">Annuler</button>
            </div>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>