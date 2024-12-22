<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@ista.com',
            'password' => Hash::make('admin@123'),
            'role_id' => $adminRole->id,
        ]);
    }
}
