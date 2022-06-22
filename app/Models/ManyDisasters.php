<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ManyDisasters extends Pivot
{
    protected $fillable = ['count'];

    protected $casts = [
        'created_at' => 'datetime:l, d M Y H:i:s',
        'updated_at' => 'datetime:l, d M Y H:i:s',
    ];
}
