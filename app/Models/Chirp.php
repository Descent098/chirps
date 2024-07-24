<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chirp extends Model
{
    use HasFactory;

    // Allows mass assignment for message field (SEE: https://bootcamp.laravel.com/blade/creating-chirps#mass-assignment-protection)
    protected $fillable = [
        'message',
    ];
}
