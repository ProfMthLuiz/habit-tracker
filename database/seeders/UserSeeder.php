<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::query()->create([
            'name' => 'Matheus Luiz',
            'email' => 'matheus@email.com',
            'password' => '123456'
        ]);
    }
}
