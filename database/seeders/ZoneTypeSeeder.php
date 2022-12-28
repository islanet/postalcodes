<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class ZoneTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('zone_types')->insert([
            'name' => 'Urbano',
            'key' => '1',
            'created_at' => new DateTime('now')
        ]);
        DB::table('zone_types')->insert([
            'name' => 'Semiurbano',
            'key' => '2',
            'created_at' => new DateTime('now')
        ]);
        DB::table('zone_types')->insert([
            'name' => 'Rural',
            'key' => '3',
            'created_at' => new DateTime('now')
        ]);
    }
}
