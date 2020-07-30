<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anh extends Model
{
    protected $table = 'anhs';
    protected $guarded = [];

    public function album()
    {
        return $this->hasMany(Album::class, 'album_id');
    }
}
