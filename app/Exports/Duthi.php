<?php

namespace App\Exports;

use App\Models\Cate_post;
use Maatwebsite\Excel\Concerns\FromCollection;

class Duthi implements FromCollection
{
    public function collection()
    {
        return Cate_post::orderBy('id', 'DESC')->get();
    }
}