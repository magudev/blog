<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\User;
use App\Models\Image;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    // ----------------------------------- RELACIONES -----------------------------------

    // Relación 1 a N (inversa) → múltiples posts pueden pertenecer al mismo usuario
    public function user() {
        return $this->belongsTo(User::class);
    }

    // Relación 1 a N (inversa) → múltiples posts pueden ser de una misma categoría
    public function category() {
        return $this->belongsTo(Category::class);
    }

    // Relación N a N → muchos posts pueden estar asociados con muchos tags
    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    // Relación 1 a 1 polimórfica
    public function image() {
        return $this->morphOne(Image::class, 'imageable');
    }
}
