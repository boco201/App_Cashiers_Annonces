<?php

use Illuminate\Database\Seeder;
use App\Models\Particulier;

class ParticuliersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Particulier::create([
            'name' => 'Particulier'
          ]);
    }
}
