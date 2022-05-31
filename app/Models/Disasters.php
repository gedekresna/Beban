<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DisasterTypes;

class Disasters extends Model
{
    use HasFactory;

    protected $fillable = ['address', 'description', 'postal_code', 'latitude', 'longitude', 'user_id'];

    protected $with = ['types'];

    public function types(){
        return $this->belongsToMany(DisasterTypes::class, 'many_disasters', 'disaster_id', 'disaster_type_id')->select('name');
    }
}
