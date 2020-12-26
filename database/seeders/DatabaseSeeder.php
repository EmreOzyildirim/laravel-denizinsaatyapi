<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(advertisements_table_seeder::class);
        $this->call(types_table_seeder::class);
        $this->call(provinces_table_seeder::class);
        $this->call(districts_table_seeder::class);
        $this->call(neighborhoods_table_seeder::class);
    }
}
