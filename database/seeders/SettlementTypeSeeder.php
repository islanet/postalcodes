<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class SettlementTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settlement_types')->insert([
            'name' => 'Colonia',
            'key' => '9',
            'created_at' => new DateTime('now')
        ]);
        DB::table('settlement_types')->insert([
            'name' => 'Aeropuerto',
            'key' => '1',
            'created_at' => new DateTime('now')
        ]);
        DB::table('settlement_types')->insert([
            'name' => 'Barrio',
            'key' => '2',
            'created_at' => new DateTime('now'),
        ]);
        DB::table('settlement_types')->insert([
            'name' => 'Campamento',
            'key' => '4',
            'created_at' => new DateTime('now')
        ]);
        DB::table('settlement_types')->insert([
            'name' => 'Equipamiento',
            'key' => '17',
            'created_at' => new DateTime('now')
        ]);
        DB::table('settlement_types')->insert([
            'name' => 'Pueblo',
            'key' => '28',
            'created_at' => new DateTime('now')
        ]);

        DB::table('settlement_types')->insert([
            'name' => 'Condominio',
            'key' => '10',
            'created_at' => new DateTime('now'),
        ]);
        DB::table('settlement_types')->insert([
            'name' => 'Ejido',
            'key' => '15',
            'created_at' => new DateTime('now')
        ]);
        DB::table('settlement_types')->insert([
            'name' => 'Fraccionamiento',
            'key' => '21',
            'created_at' => new DateTime('now')
        ]);
        DB::table('settlement_types')->insert([
            'name' => 'Granja',
            'key' => '23',
            'created_at' => new DateTime('now')
        ]);
        DB::table('settlement_types')->insert([
            'name' => 'Hacienda',
            'key' => '24',
            'created_at' => new DateTime('now')
        ]);
        DB::table('settlement_types')->insert([
            'name' => 'Paraje',
            'key' => '45',
            'created_at' => new DateTime('now')
        ]);
        DB::table('settlement_types')->insert([
            'name' => 'Ranchería',
            'key' => '29',
            'created_at' => new DateTime('now')
        ]);
        DB::table('settlement_types')->insert([
            'name' => 'Rancho',
            'key' => '48',
            'created_at' => new DateTime('now')
        ]);
        DB::table('settlement_types')->insert([
            'name' => 'Unidad habitacional',
            'key' => '31',
            'created_at' => new DateTime('now')
        ]);
        DB::table('settlement_types')->insert([
            'name' => 'Zona comercial',
            'key' => '33',
            'created_at' => new DateTime('now'),
        ]);
        DB::table('settlement_types')->insert([
            'name' => 'Zona industrial',
            'key' => '37',
            'created_at' => new DateTime('now')
        ]);
        DB::table('settlement_types')->insert([
            'name' => 'Zona federal',
            'key' => '34',
            'created_at' => new DateTime('now')
        ]);
        DB::table('settlement_types')->insert([
            'name' => 'Zona militar',
            'key' => '47',
            'created_at' => new DateTime('now')
        ]);
        DB::table('settlement_types')->insert([
            'name' => 'Puerto',
            'key' => '40',
            'created_at' => new DateTime('now')
        ]);
    }
}
