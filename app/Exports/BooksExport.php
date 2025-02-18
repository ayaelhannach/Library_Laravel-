<?php

namespace App\Exports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\FromCollection;

class BooksExport implements FromCollection
{
    /**
     * Récupérer toutes les données de livres.
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Book::select('id', 'titre', 'auteur', 'description', 'genre', 'prix', 'quantite')->get();
    }
}
