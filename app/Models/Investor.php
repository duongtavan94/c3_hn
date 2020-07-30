<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Investor extends Model
{
    public function Cate_investor()
    {

        return $this->belongsTo('App\Models\Cate_investor', 'cate_investor_id', 'id');
    }
}
