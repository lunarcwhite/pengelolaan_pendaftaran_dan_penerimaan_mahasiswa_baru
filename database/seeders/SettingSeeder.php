<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
            'id' => 1,
            'nama_settingan' => 'cek_kelulusan',
            'status' => 0,
            'date' => date("Y-m-d"),
            'time' => \Carbon\Carbon::now(),
            'menit' => 120 * 60,
            ],
            [
            'id' => 2,
            'nama_settingan' => 'waktu_ujian',
            'status' => 1,
            'date' => date("Y-m-d"),
            'time' => \Carbon\Carbon::now(),
            'menit' => 120 * 60,
            ]
            ];
        DB::table('settings')->insert($data);
    }
}
