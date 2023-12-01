<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParameterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parameters')->insert([
            [
                'type' => 'phone',
                'value' => ''
            ],
            [
                'type' => 'email',
                'value' => ''
            ],
            [
                'type' => 'address',
                'value' => ''
            ],
            [
                'type' => 'whatsapp',
                'value' => ''
            ],
            [
                'type' => 'facebook',
                'value' => ''
            ],
            [
                'type' => 'instagram',
                'value' => ''
            ],
            [
                'type' => 'youtube',
                'value' => ''
            ],
            [
                'type' => 'tiktok',
                'value' => ''
            ]
        ]);
    }
}
