<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model as Eloquent;
use DB;

class home_slider_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = 'app/developer_tools/home_slider.sql';
        DB::unprepared(file_get_contents($path));
        $this->command->info($path." basariyla veritabanina kaydedildi.");
    }
}
