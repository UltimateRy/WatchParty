<?php

namespace App\Models;

use App\Models\MovieImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    public function parties()
    {
        return $this->hasMany(Party::class);
    }

    public function movieImage()
    {
        return $this->hasOne(MovieImage::class);
    }

    protected $fillable = [
        "id",
        "title", 
        "synopsis", 
        "length",
        "created_at",
        "updated_at",
    ];

}
