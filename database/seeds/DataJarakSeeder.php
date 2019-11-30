<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class DataJarakSeeder extends Seeder
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
        DB::table('data_jarak')->insert([
            'Tanggal' => date('Y-m-d h:i:s'),
            'Nilai' => $faker->numberBetween(100,999)
        ]);
        }
    }
}
