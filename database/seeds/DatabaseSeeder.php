<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(AnnoncesTableSeeder::class);
        $this->call(ProfessionnelsTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(ProsTableSeeder::class);
        $this->call(ParticuliersTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
    }
}
