<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(DataSeed::class);
        
        $password = bcrypt('password');
         \App\Models\User::create([
            'name' => 'user',
            'email' => 'user@example.com',
            'password' => $password,
        ]);

        \App\Models\User::create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'is_admin' => 1,
            'password' => $password,
        ]); 


    }
}
