<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Disasters;

class DisasterTypes extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    protected $casts = [
        'created_at' => 'datetime:D, d M Y',
        'updated_at' => 'datetime:D, d M Y',
    ];

    public function disasters(){
        return $this->belongsToMany(Disasters::class, 'many_disasters', 'disaster_type_id', 'disaster_id')->withTimestamps()->withPivot('count');
    }
}
