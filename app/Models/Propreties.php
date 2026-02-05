<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Propreties extends Model
{
    public static function getProperties(){
        return Propreties::all();
    }

}
