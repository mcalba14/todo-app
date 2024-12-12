<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Task;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Task::factory(5)->create();

        Task::create([
            'user_id' => 1,
            'name' => 'test@example.com',
            'status' => 'Pending',
        ]);
        // $this->call([
        //     UserSeeder::class,
        // ]);
    }
}
