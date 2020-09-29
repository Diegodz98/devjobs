<?php

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Diego',
            'email' => 'diego.blaz98@gmail.com',
            'email_verified_at'=> '2020-09-25 19:54:04',
            'password'=>'$2y$10$BctLsAO.l5eaW9AnUTvYEuMySAXf3/XAok51lo8oiBV5jMoUHNGTG',
            'remember_token'=> 'null',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),

        ]);
    }
}
