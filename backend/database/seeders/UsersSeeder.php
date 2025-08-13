<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        $owner = User::create([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'email' => 'admin@hotel.com',
            'password' => Hash::make('password'),
            'phone' => fake()->phoneNumber()
        ]);
        $owner->assignRole('Hotel Owner');
        $receptionist = User::factory()->create();
        $receptionist->assignRole('Receptionist');
        User::factory(10)->create()->each(function ($user) {
            $user->assignRole('Guest');
        });
    }
}
