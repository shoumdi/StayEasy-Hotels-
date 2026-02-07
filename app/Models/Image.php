<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Image extends Model
{
    
    protected $fillable = ['url','user_id'];
    function user():BelongsTo{
        return $this->belongsTo(User::class);
    }

    // function hotel():BelongsTo{
    //     return $this->belongsTo(H);
    // }
}
