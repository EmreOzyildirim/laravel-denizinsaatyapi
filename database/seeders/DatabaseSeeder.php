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
        $this->call(properties_table_seeder::class);
        $this->call(types_table_seeder::class);
        $this->call(provinces_table_seeder::class);
        $this->call(districts_table_seeder::class);
        $this->call(agents_table_seeder::class);
        $this->call(contact_infos_seeder::class);
        $this->call(home_slider_table_seeder::class);
        $this->call(neighborhoods_table_seeder::class);
        $this->call(property_details_table_seeder::class);
        $this->call(property_type_table_seeder::class);
        $this->call(social_media_table_seeder::class);
        $this->call(main_menu_table_seeder::class);

    }
}
