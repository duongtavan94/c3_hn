<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
     protected $table = 'albums';
     protected $guarded = [];


    public function anh()
    {

        return $this->hasMany(Anh::class, 'album_id');
    }
}
