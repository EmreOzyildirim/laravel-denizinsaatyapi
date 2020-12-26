<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class advertisements_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $path = 'app/developer_tools/advertisements.sql';
        DB::unprepared(file_get_contents($path));
        $this->command->info($path." basariyla veritabanina kaydedildi.");

    }
}
