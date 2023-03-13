<?php

namespace App\Exports;

use App\Models\vcard;
use Maatwebsite\Excel\Concerns\FromCollection;

class VcardsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return vcard::all();
    }
}
