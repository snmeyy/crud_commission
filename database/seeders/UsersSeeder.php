<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'name'=> 'nisaly',
                'email'=>'nisa3@gmail.com',
                'password' => '987654321',
            ],
        ]);
    }
}
