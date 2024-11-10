<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fragrance extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['name', 'brand', 'scent_type', 'description', 'price'];
}
