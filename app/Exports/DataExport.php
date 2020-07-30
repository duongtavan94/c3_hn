<?php

namespace App\Exports;

use App\Models\Contact;
use Maatwebsite\Excel\Concerns\FromCollection;

class DataExport implements FromCollection
{
	

    public function collection()
    {
        return Contact::orderBy('id', 'DESC')->get();
    }
}