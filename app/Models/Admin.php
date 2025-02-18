<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'prenom', 'email', 'password', 'tel', 'dateNaissance'];

    public function users()
    {
        return $this->hasMany(Useer::class);
    }

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
