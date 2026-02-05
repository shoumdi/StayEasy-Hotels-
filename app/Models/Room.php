<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ['name', 'capacity', 'price', 'status', 'images', 'tag_id', 'category_id', 'proprety_id'];

}
