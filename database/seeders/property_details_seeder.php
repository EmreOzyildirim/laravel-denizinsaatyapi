<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model as Eloquent;
use DB;

class property_details_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = 'app/developer_tools/property_details.sql';
        DB::unprepared(file_get_contents($path));
        $this->command->info($path." basariyla veritabanina kaydedildi.");
    }
}
