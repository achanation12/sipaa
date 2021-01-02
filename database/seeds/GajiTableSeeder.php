<?php

use Illuminate\Database\Seeder;
use App\Gaji;
use Illuminate\Support\Facades\DB;

class GajiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gaji')->truncate();

        Gaji::create([
            'gajibln' => '1000000',
            'gajibonus' => '400000',
            'gajilembur' => '300000',
            'gajitotal' => '1700000',
            'id_karyawan' => '1',
        ]);

        Gaji::create([
            'gajibln' => '1000000',
            'gajibonus' => '400000',
            'gajilembur' => '300000',
            'gajitotal' => '1700000',
            'id_karyawan' => '2',
        ]);

        Gaji::create([
            'gajibln' => '1000000',
            'gajibonus' => '400000',
            'gajilembur' => '300000',
            'gajitotal' => '1700000',
            'id_karyawan' => '3',
        ]);

        Gaji::create([
            'gajibln' => '1000000',
            'gajibonus' => '400000',
            'gajilembur' => '300000',
            'gajitotal' => '1700000',
            'id_karyawan' => '4',
        ]);
    }
}
