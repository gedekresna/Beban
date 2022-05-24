<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disasters extends Model
{
    use HasFactory;

    protected $fillable = ['description', 'postal_code', 'city', 'latitude', 'longitude', 'user_id'];
}
