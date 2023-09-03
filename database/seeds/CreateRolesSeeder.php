<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class CreateRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('roles')->delete();
        $roles = [
              'Admin',
              'User',
              'Supervisor'
           ];
        foreach ($roles as $role) {

            $role = Role::create(['name' => $role]);
        }
    }
}
