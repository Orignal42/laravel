<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appartement extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'size',
        'floor',
        'image',
        'room',
        'price',
        'address',
        'postcode',
        'city',
        

    ];
}
