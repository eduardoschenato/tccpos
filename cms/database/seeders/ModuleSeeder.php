<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modules')->insert([
            ['name' => 'Cadastros Gerais'],
            ['name' => 'CMS'],
            ['name' => 'E-commerce'],
            ['name' => 'Imprensa'],
            ['name' => 'Ingressos'],
            ['name' => 'Sócios'],
            ['name' => 'Desempenho'],
            ['name' => 'Configurações']
        ]);
        
        DB::table('user_modules')->insert([
            ['user_id' => 1, 'module_id' => 1],
            ['user_id' => 1, 'module_id' => 2],
            ['user_id' => 1, 'module_id' => 3],
            ['user_id' => 1, 'module_id' => 4],
            ['user_id' => 1, 'module_id' => 5],
            ['user_id' => 1, 'module_id' => 6],
            ['user_id' => 1, 'module_id' => 7],
            ['user_id' => 1, 'module_id' => 8]
        ]);
    }
}
