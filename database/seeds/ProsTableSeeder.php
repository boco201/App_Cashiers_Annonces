<?php

use Illuminate\Database\Seeder;
use App\Models\Pro;

class ProsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pro::create([
          'name' => 'Professionnel'
        ]);
    }
}
