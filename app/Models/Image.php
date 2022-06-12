<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['url'];
    
    // ----------------------------------- RELACIONES -----------------------------------

    // Relación 1 a 1 polimórfica con Post
    public function imageable() {
        return $this->morphTo();
    }
}
