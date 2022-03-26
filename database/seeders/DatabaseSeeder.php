<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->create_user();
        $this->call([
            BarangSeeder::class,
            TransaksiSeeder::class,
            ReportSeeder::class,
        ]);
    }

    public function create_user()
    {
        // \App\Models\User::factory(2)->create();
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
         ]);
       $admin->createToken('auth_token')->plainTextToken;

        for ($i=0; $i < 10; $i++) { 
            $faker = \Faker\Factory::create();
            $user = User::create([
                'name' => $faker->name(),
                'email' => $faker->unique()->safeEmail(),
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
             ]);
    
            $user->createToken('auth_token')->plainTextToken;
        }
    }
}
