<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $rRole = Role::where('name', 'root')->first();
        $aRole = Role::where('name', 'admin')->first();
        $kRole = Role::where('name', 'karyawan')->first();

        $root = User::create([
            'name' => 'Root User',
            'email' => 'root@root.com',
            'password' => Hash::make('password')
        ]);

        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password')
        ]);

        $karyawan = User::create([
            'name' => 'Karyawan User',
            'email' => 'karyawan@karyawan.com',
            'password' => Hash::make('password')
        ]);

        $root->roles()->attach($rRole);
        $admin->roles()->attach($aRole);
        $karyawan->roles()->attach($kRole);
    }
}
