<?php

namespace App\Exports;

use App\Model\Alumni;
use Maatwebsite\Excel\Concerns\FromCollection;

class AlumniExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Alumni::all();
    }
}
