<?php

namespace App\Imports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\ToModel;

class BooksImport implements ToModel
{
    /**
     * Convertir chaque ligne du fichier Excel en un modèle Book.
     *
     * @param array $row
     * @return \App\Models\Book
     */
    public function model(array $row)
{
    return new Book([
        'titre' => $row['titre'] ?? 'Titre par défaut', // Valeur par défaut si titre est vide
        'auteur' => $row['auteur'] ?? 'Auteur inconnu', // Valeur par défaut si auteur est vide
        'description' => $row['description'] ?? '', // Description vide si non fourni
        'genre' => $row['genre'] ?? 'Non spécifié', // Valeur par défaut si genre est vide
        'prix' => $row['prix'] ?? 0.00, // Valeur par défaut si prix est vide
        'quantite' => $row['quantite'] ?? 0, // Valeur par défaut si quantite est vide
    ]);
}

}
