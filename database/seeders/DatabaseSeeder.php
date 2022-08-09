<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        $categories = [
            
            ['Abbigliamento'],
            ['Elettronica'],
            ['Casa'],
            ['Famiglia'],
            ['Veicoli'],
            ['Annunci'],
            ['Offerte'],
            ['Svago'],
            ['Hobby'],
            ['Abitazione'],

            ];

        foreach($categories as $category){
            DB::table('categories')->insert([
                'name' => $category[0],
            ]);
        }
        // \App\Models\User::factory(10)->create();
    }
}
