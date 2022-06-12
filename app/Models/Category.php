<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
    // ----------------------------------- RELACIONES -----------------------------------

    // Relación 1 a N → una categoría puede tener muchos posts asociados
    public function posts() {
        return $this->hasMany(Post::class);
    }

}
