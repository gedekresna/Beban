<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManyDisasters extends Model
{
    use HasFactory;

    protected $fillable = ['disaster_id'];

    const UPDATED_AT = null;
    const CREATED_AT = null;
}
