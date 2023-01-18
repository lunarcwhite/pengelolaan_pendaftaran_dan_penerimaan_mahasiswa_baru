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
        DB::table('settings')->insert([
            'id' => 1,
            'status' => 0,
            'date' => date("Y-m-d"),
            'time' => \Carbon\Carbon::now()
        ]);
    }
}
