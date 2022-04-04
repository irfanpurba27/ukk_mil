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
        $user = [
            [
               'name'=>'Admin',
               'email'=>'admin@hotel.com',
                'is_admin'=>'admin',
               'password'=> bcrypt('123456'),
            ],
            [
               'name'=>'Resepsionis',
               'email'=>'resepsionis@hotel.com',
                'is_admin'=>'resepsionis',
               'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'User',
                'email'=>'user@hotel.com',
                 'is_admin'=>'user',
                'password'=> bcrypt('123456'),
             ],
            
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
