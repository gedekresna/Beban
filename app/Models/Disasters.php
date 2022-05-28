<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disasters extends Model
{
    use HasFactory;

    protected $fillable = ['address', 'description', 'postal_code', 'latitude', 'longitude', 'user_id', 'disaster_type_id'];
}
