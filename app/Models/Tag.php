<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'color'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    // ----------------------------------- RELACIONES -----------------------------------

    // Relación N a N → muchos tags pueden estar asociados con muchos posts
    public function posts() {
        return $this->belongsToMany(Post::class);
    }
    
}
