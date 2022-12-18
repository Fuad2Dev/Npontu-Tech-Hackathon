<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\TaskSeeder;
use Database\Seeders\ActivitySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Fuad Muhammed',
            'email' => 'fuad2dev@gmail.com'
        ]);

        $this->call(UserSeeder::class);
        $this->call(ActivitySeeder::class);
        $this->call(TaskSeeder::class);
    }
}
