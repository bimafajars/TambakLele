<?php

use Illuminate\Database\Seeder;

use Faker\ Factory as faker;

class DatapHSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for($i = 1; $i <= 150; $i++){
        DB::table('data_pH')->insert([
            'Tanggal' => date('Y-m-d h:i:s'),
            'Nilai' => $faker->numberBetween(0,14)
        ]);
        }
    }
}
