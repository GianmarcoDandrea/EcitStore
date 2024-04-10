<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        
        $password = "password123";

        for ($i = 1; $i <= 5; $i++) {
            $user = new User();
            $user->name = $faker->firstName();
            $user->surname = $faker->lastName();
            $user->password = Hash::make($password);
            $user->email = "email{$i}@email.com"; 
            if( $i === 1 ) {
                $user->type = 'admin';
            } else {
                $user->type = 'guest';
            }
                
            $user->save();

        }
    }
}