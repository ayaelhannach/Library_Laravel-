<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Favorite;
use App\Models\Order;
use App\Models\OrderBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

use App\Exports\BooksExport;
use Maatwebsite\Excel\Facades\Excel;


use Illuminate\Support\Facades\DB;


use App\Imports\BooksImport;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all(); 

    foreach ($books as $book) {
        $imagePath = public_path('images/books/' . $book->image);
        if (!File::exists($imagePath) || empty($book->image)) {
            $book->image = 'placeholder.png';
        }
    }

    return view('home', compact('books'));
    }


    public function adminBooks()
    {
        
        $books = DB::table('books')->get(); 
        return view('booksAdmin.index', ['books' => $books]);
    }

    public function edit(Book $book)
{
    return view('booksAdmin.edit', compact('book'));
}

public function update(Request $request, Book $book)
{
    $request->validate([
        'titre' => 'required|string|max:255',
        'auteur' => 'required|string|max:255',
        'genre' => 'required|string|max:255',
        'prix' => 'required|numeric|min:0',
        'image' => 'nullable|image|max:2048'
    ]);

    $book->update($request->only(['titre', 'auteur', 'genre', 'prix']));

    if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images/books'), $imageName);
        $book->image = $imageName;
        $book->save();
    }

    return redirect()->route('admin.books')->with('success', 'Livre modifié avec succès.');
}

public function create()
{
    return view('booksAdmin.create');
}


public function store(Request $request)
{
     
     $validatedData = $request->validate([
        'titre' => 'required|string|max:255',
        'auteur' => 'required|string|max:255',
        'genre' => 'required|string|max:255',
        'prix' => 'required|numeric',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    
    if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images/books'), $imageName);
        $validatedData['image'] = $imageName;
    }

    
    Book::create($validatedData);

    
    return redirect()->route('admin.books')->with('success', 'Livre ajouté avec succès.');
}


    public function addToFavorites($bookId)
    {
        $user = Auth::user();
        $favorite = Favorite::firstOrCreate([
            'user_id' => $user->id,
            'book_id' => $bookId,
        ]);

        return response()->json([
            'message' => $favorite ? 'Added to favorites' : 'Already in favorites'
        ]);
    }


    public function destroy(Book $book)
{
    
    if ($book->image && File::exists(public_path('images/books/' . $book->image))) {
        
        File::delete(public_path('images/books/' . $book->image));
    }

    
    $book->delete();

    
    return redirect()->route('admin.books')->with('success', 'Livre supprimé avec succès.');
}
//     public function show(Book $book)
// {
//     return view('books.show', compact('book'));
// }

    public function addToCart($bookId)
    {
        $user = Auth::user();
        $order = Order::firstOrCreate(['user_id' => $user->id]);

        $orderBook = OrderBook::firstOrCreate([
            'order_id' => $order->id,
            'book_id' => $bookId,
        ], [
            'quantite' => 1,
        ]);

        $orderBook->increment('quantite');

        return response()->json([
            'message' => 'Added to cart'
        ]);
    }





    /**
     * Exporter les livres au format Excel.
     *
     * @return \Maatwebsite\Excel\Facades\Excel
     */
    public function exportBooks()
    {
        return Excel::download(new BooksExport, 'books.xlsx');
    }











    /**
     * Importer les livres depuis un fichier Excel.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function importBooks(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        Excel::import(new BooksImport, $request->file('file'));

        return back()->with('success', 'Livres importés avec succès!');
    }


}
