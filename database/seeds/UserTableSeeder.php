<?php

use Illuminate\Database\Seeder;
use App\User;

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
               'name'=>'Luciano Cunha',
               'email'=> 'luno84@gmail.com',
               'password'=> bcrypt('123456')
       ]);
    }
}
