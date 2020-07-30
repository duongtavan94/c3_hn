<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cate_investor extends Model
{
    public function Investor()
    {
        return $this->hasMany(Investor::class, 'cate_investor_id');
    }
}
