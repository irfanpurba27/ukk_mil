<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name'=>'Admin Role',
            'email'=>'admin@role.com',
            'password'=> bcrypt('123456'),
            
        ]);
 
        $admin->assignRole('admin');
        
        $user = User::create([
            'name'=>'User Role',
            'email'=>'user@role.com',
            'password'=> bcrypt('123456'),
        ]);
        $user->assignRole('user');

        $resepsionis = User::create([
            'name'=>'Resepsionis Role',
            'email'=>'resepsionis@role.com',
            'password'=> bcrypt('123456'),
            
        ]);
        

        $resepsionis->assignRole('resepsionis');
    }
}