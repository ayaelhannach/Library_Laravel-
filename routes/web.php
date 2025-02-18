<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Book;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BookController;

Route::get('/', [BookController::class, 'index'])->name('home');

//Route::post('/favorites', [FavoriteController::class, 'store'])->name('favorites.store');
//Route::delete('/favorites/{favorite}', [FavoriteController::class, 'destroy'])->name('favorites.destroy');
//Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');

// routes/web.php
Route::get('/admin/edit-delete-books', [BookController::class, 'editDeleteBooks'])->name('admin.editDeleteBooks');


Route::get('/', function () {
    return view('home');
});

Route::get('/admin/books', [BookController::class, 'books'])->name('admin.books');

Route::get('/', function () {
    $books = Book::all(); // Fetch all books from the database
    return view('home', compact('books')); // Pass books to the home view
})->name('home'); // Add the name here

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');



Route::get('/admin', function () {
    return view('layouts.admin');
})->middleware(['auth', 'verified'])->name('admin');

Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('home'); // Or wherever you want to redirect after logout
})->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


use App\Http\Controllers\AdminController;

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    // Dashboard Route
    Route::get('/admin', function () {
        return view('adminPage.DashboardAdmin');// Ensure this matches your folder structure
    })->middleware(['auth', 'admin'])->name('admin.dashboard');
    Route::get('/admin', [AdminController::class, 'dashboard'])->middleware(['auth'])->name('admin.dashboard');

    
    // Profile Route
    Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');
    
    // User Management Routes
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/loans', [AdminController::class, 'loans'])->name('admin.loans');
    
    // Books Management Routes
    //Route::get('/books', [AdminController::class, 'books'])->name('admin.books');
    //Route::get('/add-book', [AdminController::class, 'addBook'])->name('admin.addBook');
    //Route::get('/edit-delete-books', [AdminController::class, 'editDeleteBooks'])->name('admin.editDeleteBooks');
});

Route::get('/admin/generate-pdf', [AdminController::class, 'generatePDF'])->name('admin.generatePDF');



Route::middleware(['auth'])->group(function () {

Route::post('/favorites/store/{book}', [FavoriteController::class, 'store'])->name('favorites.store');

Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');
Route::delete('/favorites/destroy/{book}', [FavoriteController::class, 'destroy'])->name('favorites.destroy');


Route::get('/admin/books', [BookController::class, 'adminBooks'])->name('admin.books');

   
});


Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
Route::put('/books/{book}', [BookController::class, 'update'])->name('books.update');

Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy');


// Afficher le formulaire d'ajout de livre
Route::get('/admin/books/create', [BookController::class, 'create'])->name('admin.books.create');

// Enregistrer le nouveau livre dans la base de données
Route::post('/admin/books', [BookController::class, 'store'])->name('admin.books.store');


use App\Http\Controllers\UserController;

Route::middleware(['auth'])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index'); // Liste des utilisateurs
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit'); // Formulaire de modification
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update'); // Mettre à jour un utilisateur
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy'); // Supprimer un utilisateur
});






Route::get('export-books', [BookController::class, 'exportBooks'])->name('books.export');
Route::post('import-books', [BookController::class, 'importBooks'])->name('books.import');

