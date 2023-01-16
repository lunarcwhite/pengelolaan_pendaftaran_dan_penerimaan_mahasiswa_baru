<?php

namespace App\Exports;

use App\Models\Jurusan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class lulusExport implements WithMultipleSheets
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;
    public function sheets(): array
    {
        $jurusans = Jurusan::all();
        $sheets = [];

        foreach($jurusans as $jurusan){
            $sheets[] = new PendaftarExport($jurusan->kode_jurusan);
        }
        return $sheets;
    }
}
