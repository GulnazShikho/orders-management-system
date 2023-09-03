<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class CreateAdminSeeder extends Seeder
{
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            $user = new User();
            $user->name = "AdminSamer";
            $user->email = "AdminSamer@gmail.com";
            $user->password = bcrypt('123456');
            $user->role_name = "Admin";
            $user->save();
            $user->roles()->detach();
            $user->assignRole('Admin');
            $role = Role::findById(1);
            $permissions = Permission::pluck('id','id')->all();
            $role->syncPermissions($permissions);

            $role = Role::findById(3);
            $role ->givePermissionTo([6,7]);

            $role = Role::findById(2);
            $role ->givePermissionTo([1,2,3,8]);

    }
}
