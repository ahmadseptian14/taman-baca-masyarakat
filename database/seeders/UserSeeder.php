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
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin12345'),
                'roles' => 'ADMIN',
                'no_hp' => '081201271'
            ],

            [   
                // 'tbm_id' => '1',
                'name' => 'TBM Cipocok',
                'email' => 'tbmcipocok@gmail.com',
                'password' => Hash::make('cipocok12345'),
                'roles' => 'PENGURUS',
                'no_hp' => '0897212517'
            ],

            [   
                // 'tbm_id' => '2',
                'name' => 'TBM Ciracas',
                'email' => 'tbmciracas@gmail.com',
                'password' => Hash::make('iracas12345'),
                'roles' => 'PENGURUS',
                'no_hp' => '08129271271'
            ]
            
        ];

        DB::table('users')->insert($users);
    }
}
