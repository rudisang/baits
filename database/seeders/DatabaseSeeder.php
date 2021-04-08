<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Eloquent\Factories\Faker\Generator;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $password = "12345678";
        \App\Models\User::factory(1)->create();
        \App\Models\User::factory(1)->create([
            'name' => "Police",
            'surname' => "Baits",
            'gender' => 'Male',
            'age' => '1998-07-21',
            'role_id' => 2,
            'mobile' => 76123456,
            'email' => 'police@baits.com',
            'password' => Hash::make($password), 
            ]);

            \App\Models\User::factory(1)->create([
                'name' => "Operator",
                'surname' => "Baits",
                'gender' => 'Male',
                'age' => '1998-07-21',
                'role_id' => 4,
                'mobile' => 76123456,
                'email' => 'operator@baits.com',
                'password' => Hash::make($password), 
                ]);

                \App\Models\User::factory(1)->create([
                    'name' => "Od",
                    'surname' => "Baits",
                    'gender' => 'Male',
                    'age' => '1998-07-21',
                    'role_id' => 1,
                    'mobile' => 76123456,
                    'email' => 'od@baits.com',
                    'password' => Hash::make($password), 
                    ]);

          

        \App\Models\Role::factory()
        ->count(4)
        ->state(new Sequence(
            ['role' => 'Farmer'],
            ['role' => 'Police'],
            ['role' => 'Admin'],
            ['role' => 'Operator'],
        ))
        ->create();
    }
}
