<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name'=> 'Mega Wulan',
                'email'=> 'Megaw@gmail.com',
                'role'=> 'user',
                'password'=>bcrypt('123456')
            ],            
            [
                'name'=> 'Adprian Pratama',
                'email'=> 'admin@gmail.com',
                'role'=> 'admin',
                'password'=>bcrypt('123456')
            ]         

            ];
            foreach($userData as $key => $val){
                User::create($val);
            }
    }
}
