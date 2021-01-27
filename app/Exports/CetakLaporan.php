<?php

namespace App\Exports;

use App\Models\laporan;
use Maatwebsite\Excel\Concerns\FromCollection;

class CetakLaporan implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return laporan::all();
    }
}
