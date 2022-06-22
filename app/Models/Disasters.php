<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DisasterTypes;
use App\Models\ManyDisasters;

class Disasters extends Model
{
    use HasFactory;

    protected $fillable = ['address', 'description', 'city', 'postal_code', 'latitude', 'longitude', 'user_id'];

    protected $with = ['types'];

    protected $casts = [
        'created_at' => 'datetime:D, d M Y H:i:s',
        'updated_at' => 'datetime:D, d M Y H:i:s',
    ];

    public function types(){
        return $this->belongsToMany(DisasterTypes::class, 'many_disasters', 'disaster_id', 'disaster_type_id')->using(ManyDisasters::class)->withTimestamps()->withPivot('count');
    }
}
