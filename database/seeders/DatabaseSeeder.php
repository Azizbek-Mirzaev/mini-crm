<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Lead;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
  $users = User::factory(2)->create();

$users->each(function ($user) {
    Lead::factory(10)->create([
        'assigned_to' => $user->id,
    ]);
});

    }
}
