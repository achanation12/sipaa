<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Karyawan;
use App\User;

class KaryawanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('Karyawan')->truncate();
        DB::table('Users')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Karyawan::create([
            'name' => 'Galih Jp',
            'email' => 'galih@galih.com',
            'tempatlahir' => 'tangerang',
            'tanggallahir' => '1998-05-27',
            'jeniskelamin' => 'pria',
            'agama' => 'islam',
            'notelp' => '098726378235',
            'alamat' => 'Kp. Citumenggung, Kec. Bojong, Kab. Pandeglang'
        ]);

        Karyawan::create([
            'name' => 'Bella Ok',
            'email' => 'bella@bella.com',
            'tempatlahir' => 'tangerang',
            'tanggallahir' => '2003-10-01',
            'jeniskelamin' => 'wanita',
            'agama' => 'islam',
            'notelp' => '09872637898',
            'alamat' => 'Kp. Citumenggung, Kec. Bojong, Kab. Pandeglang'
        ]);

        Karyawan::create([
            'name' => 'Surur',
            'email' => 'surur@surur.com',
            'tempatlahir' => 'pandeglang',
            'tanggallahir' => '1997-01-09',
            'jeniskelamin' => 'pria',
            'agama' => 'islam',
            'notelp' => '098726378222',
            'alamat' => 'Kp. Citumenggung, Kec. Bojong, Kab. Pandeglang'
        ]);

        Karyawan::create([
            'name' => 'miftah',
            'email' => 'miftah@miftah.com',
            'tempatlahir' => 'pandeglang',
            'tanggallahir' => '1998-07-08',
            'jeniskelamin' => 'pria',
            'agama' => 'islam',
            'notelp' => '098726374435',
            'alamat' => 'Kp. Citumenggung, Kec. Bojong, Kab. Pandeglang'
        ]);
    }
}
