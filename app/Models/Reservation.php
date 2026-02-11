<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Reservation extends Model
{


    public function room():BelongsTo{
        return $this->belongsTo(Room::class);
    }
    public function payment():BelongsTo{
        return $this->belongsTo(Payment::class);
    }
}
