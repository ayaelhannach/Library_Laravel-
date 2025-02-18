<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index()
    {
        $favorites = Favorite::where('user_id', Auth::id())->with('book')->get();
        return view('favorites.index', compact('favorites'));
    }

    public function store(Book $book)
{
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Vous devez être connecté pour ajouter un favori.');
    }

    $existingFavorite = Favorite::where('user_id', Auth::id())
                                ->where('book_id', $book->id)
                                ->first();

    if (!$existingFavorite) {
        Favorite::create([
            'user_id' => Auth::id(),
            'book_id' => $book->id
        ]);
    }

    return redirect()->back()->with('success', 'Livre ajouté aux favoris');
}

    public function destroy(Book $book)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour supprimer un favori.');
        }

        Favorite::where('user_id', Auth::id())->where('book_id', $book->id)->delete();

        return redirect()->back()->with('success', 'Livre supprimé des favoris');
    }
}
