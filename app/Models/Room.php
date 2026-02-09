<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ['id','name', 'capacity', 'price', 'status', 'images', 'tag_id', 'category_id', 'proprety_id', 'created_at', 'updated_at'];

    public function tag(){
        return $this->belongsToMany(Tag::class, 'rooms_tags', 'room_id', 'tag_id');
    }
    public function propreties(){
        return $this->belongsToMany(Propreties::class, 'proprety_room', 'room_id', 'proprety_id');
    }
    public function categories(){
        return $this->belongsTo(Categories::class, 'category_id');
    }
}
