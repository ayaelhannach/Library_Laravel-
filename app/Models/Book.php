<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['titre', 'auteur', 'description', 'genre', 'image', 'prix', 'quantite'];

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_book')->withPivot('quantite');
    }

    public function favorites()
    {
        return $this->belongsToMany(Favorite::class);
    }
}
