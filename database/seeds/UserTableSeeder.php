<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Kushagra Saxena',
            'email' => 'kkss420@gmail.com',
            'password' => bcrypt('secret')
        ]);

        User::create([
            'name' => 'Nikhil Verma',
            'email' => 'verma.nik97@gmail.com',
            'password' => bcrypt('secret')
        ]);

        User::create([
            'name' => 'Pragati Shekhar',
            'email' => 'pragati.24shekhar@gmail.com',
            'password' => bcrypt('secret')
        ]);

        factory(App\User::class, 50)->create();
    }
}
