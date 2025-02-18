<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Book;
use App\Models\Useer;


class AdminController extends Controller
{
   public function dashboard()
{
    return view('adminPage.DashboardAdmin');
}

    public function profile()
    {
        return view('admin.profile');
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function generatePDF()
    {
        $books = Book::count();
        $users = Useer::count();
       

        $data = [
            'books' => $books,
            'users' => $users,
            
            'date' => now()->format('d/m/Y'),
        ];

        $pdf = Pdf::loadView('adminPage.reports', $data);
        return $pdf->download('rapport_admin.pdf');
    }
    public function loans()
    {
        return view('admin.loans');
    }

    public function books()
    {
        return view('admin.books');
    }

    public function addBook()
    {
        return view('admin.addBook');
    }

    public function editDeleteBooks()
    {
        return view('admin.editDeleteBooks');
    }


    
    
}
