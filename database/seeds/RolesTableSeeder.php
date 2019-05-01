<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // DB::table('clients')->insert(['companyName' => "OSECAC"]);
      // DB::table('clients')->insert(['companyName' => "OSDE"]);
      // DB::table('clients')->insert(['companyName' => "OSDIPP"]);
      // DB::table('clients')->insert(['companyName' => "SANCOR"]);
      $permission1 = Permission::create(['name' => 'audit-edit-patient']);
      $permission2 = Permission::create(['name' => 'audit-edit-expedient']);
      $permission3 = Permission::create(['name' => 'audit-edit-objectives']);
      $permission4 = Permission::create(['name' => 'audit-edit-report']);
      $permission5 = Permission::create(['name' => 'audit-edit-conclution']);
      $permission6 = Permission::create(['name' => 'audit-edit-history']);
      $permission7 = Permission::create(['name' => 'audit-edit-resume']);

      $permission8 = Permission::create(['name' => 'audit-read-patient']);
      $permission9 = Permission::create(['name' => 'audit-read-expedient']);
      $permission10 = Permission::create(['name' => 'audit-read-objectives']);
      $permission11 = Permission::create(['name' => 'audit-read-report']);
      $permission12 = Permission::create(['name' => 'audit-read-conclution']);
      $permission13 = Permission::create(['name' => 'audit-read-history']);
      $permission14 = Permission::create(['name' => 'audit-read-resume']);

      $permission15 = Permission::create(['name' => 'audit-create']);
      $permission16 = Permission::create(['name' => 'audit-export']);

      $role1 = Role::create(['name' => 'Administrador']);
      $role1->save();
      $role1->syncPermissions($permission1,
                              $permission2,
                              $permission3,
                              $permission4,
                              $permission5,
                              $permission6,
                              $permission7,
                              $permission8,
                              $permission9,
                              $permission10,
                              $permission11,
                              $permission12,
                              $permission13,
                              $permission14,
                              $permission15,
                              $permission16);

      $role2 = Role::create(['name' => 'Backoffice']);
      $role2->save();
      $role2->syncPermissions($permission1,
                              $permission2,
                              $permission6,
                              $permission8,
                              $permission9,
                              $permission13,
                              $permission15);

      $role3 = Role::create(['name' => 'Coordinador']);
      $role3->save();
      $role3->syncPermissions($permission3,
                              $permission5,
                              $permission6,
                              $permission8,
                              $permission9,
                              $permission10,
                              $permission11,
                              $permission12,
                              $permission13);

      $role4 = Role::create(['name' => 'Auditor']);
      $role4->save();
      $role4->syncPermissions($permission4,
                              $permission6,
                              $permission8,
                              $permission9,
                              $permission10,
                              $permission11,
                              $permission13);


      $role5 = Role::create(['name' => 'Cliente']);
      $role5->save();
      $role5->syncPermissions($permission14);

      $role6 = Role::create(['name' => 'Cliente gerencial']);
      $role6->save();
      $role6->syncPermissions($permission14);



      // $permission = Permission::create(['name' => 'edit articles']);
      // $role->syncPermissions($permissions);
      // $permission->syncRoles($roles);
    }
}
