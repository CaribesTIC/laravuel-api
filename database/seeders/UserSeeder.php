<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
        \App\Models\User::factory(1)->create([
            'name' => 'John Doe',
            'email' => 'user@email.ext',
            'email_verified_at' => null,
            'is_admin' => true,
            'role_id' => 1       
          ]
        );
        \App\Models\User::factory(20)->create();
    
    
        /*User::factory()->create([
            "email" => "admin@admin.com",
            "password" => Hash::make("asdf"),
            //"role" => "admin",
            "role_id" => 1,
        ]);

        User::factory()->create([
            "email" => "user@user.com",
            "password" => Hash::make("asdf"),
            //"role" => "user",
            "role_id" => 2,
        ]);
        
        User::factory(14)->create();      */
    }
}
