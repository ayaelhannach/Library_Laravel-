<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Useer extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'prenom', 'email', 'password', 'tel', 'dateNaissance'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
}
