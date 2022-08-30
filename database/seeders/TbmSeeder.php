<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TbmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tbms = [
            [   
                'nama_tbm' => 'TBM Cipocok',
                'deskripsi' => 'Terletak di cipocok jaya',
                'no_hp' => '0821821278'
            ],
            [   
                'nama_tbm' => 'TBM Ciracas',
                'deskripsi' => 'Terletak di ciracas jaya',
                'no_hp' => '0892126172'
            ],
        ];

        DB::table('tbm')->insert($tbms);
    }
}
