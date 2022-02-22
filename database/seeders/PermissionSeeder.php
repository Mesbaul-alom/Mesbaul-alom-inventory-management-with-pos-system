<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Contracts\Permission;
use Spatie\Permission\Models\Permission as ModelsPermission;

use Spatie\Permission\Models\Role;

use App\Models\SuperAdmin;
use App\Models\User;


class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

//role create

$superAdminRole = Role::create(['name'=>'superadmin']);
$admin = Role::create(['name'=>'admin']);
$manager = Role::create(['name'=>'Manager']);




        $superadminpermissions= [
            "admin.createPdf",
        //admin permission
           "admin.create",
           "admin.update",
           "admin.delete",
           "admin.view",

        //user permission
           "user.create",
           "user.update",
           "user.delete",
           "user.view",
           //product permission
           "product.create",
           "product.update",
           "product.delete",
           "product.view"



        ];
        $adminpermissions= [


        //user permission
        "admin.createPdf",
           "user.create",
           "user.update",
           "user.delete",
           "user.view",
           //product permission
           "product.create",
           "product.update",
           "product.delete",
           "product.view"



        ];
        $managerpermissions= [

           //product permission
           "product.create",
           "product.view"



        ];



        for ($i=0; $i <count($superadminpermissions) ; $i++) {
            $permission = ModelsPermission::create(['name' => $superadminpermissions[$i]]);


        }
        $superAdminRole->syncPermissions($superadminpermissions);
        $admin->syncPermissions( $adminpermissions);
        $manager->syncPermissions($managerpermissions);

        $sadmin= User::find(1);

        $sadmin->assignRole('superadmin');

        $sadmin= User::find(2);

        $sadmin->assignRole('admin');

        $sadmin= User::find(3);

        $sadmin->assignRole('Manager');



    }
}
