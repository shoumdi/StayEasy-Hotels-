<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = ['id','name'];
    public static function getCategories(){
        return Categories::all();
    }
    public function rooms(){
        return $this->hasMany(Room::class, 'category_id');
    }

}
