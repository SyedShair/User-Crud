<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    function has_rack()
    {
        return $this->hasOne(Rack::class,'id','rack_id');
    }

}
