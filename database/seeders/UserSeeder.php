<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Ahmad Septian',
                'email' => 'ahmadseptian@gmail.com',
                'password' => Hash::make('septian12345'),
                'roles' => 'ADMIN'
            ],
            [
                'name' => 'Ridho Pratama',
                'email' => 'ridho@gmail.com',
                'password' => Hash::make('ridho12345'),
                'roles' => 'PENGURUS'
            ],
            [
                'name' => 'Ikhsan Alwi',
                'email' => 'ikhsan@gmail.com',
                'password' => Hash::make('ikhsan12345'),
                'roles' => 'ANGGOTA'
            ]
        ];

        DB::table('users')->insert($users);
    }
}
