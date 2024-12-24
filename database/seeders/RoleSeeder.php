<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::insert([
            ['name' => 'teacher', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'student', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
