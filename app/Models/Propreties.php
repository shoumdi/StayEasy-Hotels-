<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Propreties extends Model
{
    protected $fillable = ['name'];
    public static function getProperties(){
        return Propreties::all();
    }
    public function rooms(){
        return $this->belongsToMany(Room::class);
    }
}
