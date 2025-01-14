<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Macbook extends Model
{
    use HasFactory;
    protected $table = 'macbook';
    protected $fillable =[
        'series',
        'price',
        'stock',
    ];
}
