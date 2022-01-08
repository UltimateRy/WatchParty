<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieImage extends Model
{
    use HasFactory;

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    protected $fillable = [
        "id",
        "file_path", 
        "created_at", 
        "updated_at"
    ];

}
