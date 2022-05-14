<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/* Cet Modéle représente "Projet.php" demander dans le projet */

class Listing extends Model
{
    use HasFactory;

    // protected $fillable = ['title', 'tags', 'logo', 'price', 'email', 'user_id', 'delivery_time', 'website', 'description'];

    public function scopeFilter($querry, array $filters)
    {
        if ($filters['tag'] ?? false) {
            $querry->where('tags', 'like', '%' . request('tag') . '%');
        }


        if ($filters['search'] ?? false) {
            $querry->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%')
                ->orWhere('tags', 'like', '%' . request('search') . '%');
        }
    }

    // Relation avec l'utilisateur
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
