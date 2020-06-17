<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Immobiliers'
        ]);
        //
        Category::create([
            'name' => 'Véhicules'
        ]);

        Category::create([
            'name' => 'Electronnic'
        ]);

        Category::create([
            'name' => 'Batéaux'
        ]);

        Category::create([
            'name' => 'Emploi'
        ]);
    }
}
