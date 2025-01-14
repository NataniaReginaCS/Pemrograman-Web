<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_path',
        'name',
        'release_year',
        'description',
    ];

    public function movie(){
        return $this->belongsto(movie::class, 'id_movie');
    }
}
