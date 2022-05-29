<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $users = [
            [
               'name'=>'admin',
               'email'=>'admin@theorie.nl',
                'is_admin'=>'1',
               'password'=> bcrypt('123456'),
            ],
            [
               'name'=>'user',
               'email'=>'user@theorie.nl',
                'is_admin'=>'0',
               'password'=> bcrypt('123456'),
            ],
        ];

        foreach ($users as $key => $value) {
            User::create($value);
        }
    }
}
