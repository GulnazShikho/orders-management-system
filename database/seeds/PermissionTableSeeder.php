<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->delete();
        $permissions = [
         'Add Order',
         'Edit Order',
         'Delete Order',
         'Edit order Status',
         'Add Notes to the order',
         'view users List',
         'view all user orders',
         'view users orders',
         'change user role'

        ];
        foreach ($permissions as $permission) {

            Permission::create(['name' => $permission]);
            }
    }
}
