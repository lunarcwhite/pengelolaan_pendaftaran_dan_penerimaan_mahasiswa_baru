<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;


class KampusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('kampuses')->insert([
            'kop_logo_dinas'=>'k.png',
            'kop_nama_kampus'=>'Universitas Khayangan',
            'kop_alamat'=>'Jl.Khayhangan No.35 Kec.Muka Cianjur',
            'kop_telepon'=>'0263 243178',
            'kop_pos'=>'43210',
            'kop_website'=> 'https://khayanganuniv.shc.id',
            'kop_email'=>'khayangan.info@ac.com',
           // `kop_nama_disdik`=>'KEMENTRIAN RISET TEKNOLOGI DAN PENDIDIKAN TINGGI',
            'kop_th_pelajaran'=>'2022-2023',
            'nama_surat'=>'SURAT KETERANGAN LULUS',
            'no_surat'=>'2090/2020/3000-8',
            'pembuka_surat'=>'Yang bertanda tangan di bawah ini, Kepala Rektorat Universitas Khayangan,  Kabupaten Cianjur, Provinsi Jawa Barat menerangkan bahwa :',
            'penutup_surat'=>'Dari satuan pendidikan berdasarkan hasil ujian sekolah Tahun pelajaran 2022/2023\r\n\r\nDemikian Surat keterangan ini dibuat untuk digunakan sebagaimana mestinya.',
            'jabatan_penandatangan'=>'KEPALA REKTORAT',
            'nama_penandatangan'=>'Dr. Bill Coulson',
            'nip_penandatangan'=>'19202023456214100',
            'tempat'=>'Cianjur',
            'tanggal'=>'2023-01-20',
            'tanda_tangan'=> 'ttd.png'
        ]);
    }
}
