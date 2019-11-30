<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        DB::table('admins')->insert([
            'nama'=> 'TambakUdang','email'=> 'tambakudangjaya@gmail.com', 'password' => bcrypt('12345678')
        ]);
    }
}
