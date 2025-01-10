<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Disable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        // Clear existing roles and role_user entries
        DB::table('role_user')->truncate();
        DB::table('roles')->truncate();

        // Enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        // Create roles
        $admin = Role::create(['name' => 'admin']);
        $seller = Role::create(['name' => 'seller']);
        $user = Role::create(['name' => 'user']);

        // Create example users for each role
        $adminUser = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now()
        ]);

        $sellerUser = User::create([
            'name' => 'Seller User',
            'email' => 'seller@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now()
        ]);

        $regularUser = User::create([
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now()
        ]);

        // Assign roles
        $adminUser->roles()->attach($admin->id);
        $sellerUser->roles()->attach($seller->id);
        $regularUser->roles()->attach($user->id);
    }
}