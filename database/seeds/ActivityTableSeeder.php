<?php

use App\Activity;
use App\User;
use Illuminate\Database\Seeder;

class ActivityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Activity::class, 50)->create()->each(function (Activity $a) {
            $users = User::all()->pluck('id')->toArray();
            $randomUserId = array_random($users);
            $a->users()->attach($randomUserId, [
                'is_owner' => true,
                'role' => 'role'
            ]);
        });
    }
}
