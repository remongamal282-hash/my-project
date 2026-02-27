<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodect extends Model
{
    /** @use HasFactory<\Database\Factories\ProdectFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'descripshin',
        'price',
        'image',
    ];
}
