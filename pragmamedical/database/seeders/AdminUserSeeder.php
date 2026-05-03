<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@pragmamedical.az'],
            [
                'name' => 'Admin',
                'password' => Hash::make('Troya@9977AA'),
            ]
        );
    }
}