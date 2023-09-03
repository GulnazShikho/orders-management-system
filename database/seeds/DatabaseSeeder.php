<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call( OrderStatusSeeder::class);
        $this->call( PermissionTableSeeder::class);
        $this->call( CreateRolesSeeder::class);
        $this->call( CreateAdminSeeder::class);
    }
}
