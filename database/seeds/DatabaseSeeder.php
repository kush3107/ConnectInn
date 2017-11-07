<?php

use App\Activity;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Activity::truncate();
        User::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
         $this->call(UserTableSeeder::class);
         $this->call(ActivityTableSeeder::class);
    }
}
