<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('player_positions')->insert([
            [
                'name' => 'Goleiro',
                'abbreviation' => 'G'
            ],
            [
                'name' => 'Lateral',
                'abbreviation' => 'L'
            ],
            [
                'name' => 'Zagueiro',
                'abbreviation' => 'Z'
            ],
            [
                'name' => 'Volante',
                'abbreviation' => 'V'
            ],
            [
                'name' => 'Meia',
                'abbreviation' => 'M'
            ],
            [
                'name' => 'Atacante',
                'abbreviation' => 'A'
            ]
        ]);
    }
}
