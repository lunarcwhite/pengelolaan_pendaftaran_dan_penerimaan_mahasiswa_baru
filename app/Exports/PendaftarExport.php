<?php

namespace App\Exports;

use App\Models\Pendaftar;
use App\Models\Jurusan;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PendaftarExport implements FromArray, WithHeadings, WithTitle, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    private $jurusans;

    public function __construct($jurusans)
    {
        $this->jurusans = $jurusans;
    }

    public function array(): array
    {
        $pendaftar = Pendaftar::where('lulus', 1)->where('jurusan_kode', $this->jurusans)->get();
        $pendaftar = $pendaftar;
        $pendaftar_filter = [];
        foreach($pendaftar as $value => $item){
            $jurusan = Jurusan::where('kode_jurusan', $item->jurusan_kode)->pluck('nama_jurusan')->first();
            $pendaftar_filter[$value]['no'] = $value+1;
            $pendaftar_filter[$value]['no_reg'] = $pendaftar[$value]->no_reg;
            $pendaftar_filter[$value]['nama'] = $pendaftar[$value]->nama;
            $pendaftar_filter[$value]['jurusan'] = $jurusan;
            $pendaftar_filter[$value]['status'] = 'Lulus';
        }

        return $pendaftar_filter;
    }

    public function headings(): array
    {
        return [
            'No',
            'No Registrasi',
            'Nama',
            'Jurusan',
            'Status'
        ];
    }
    public function title(): string
    {
        $nama = Jurusan::find($this->jurusans);
        return ucwords($nama->nama_jurusan);
    }
}