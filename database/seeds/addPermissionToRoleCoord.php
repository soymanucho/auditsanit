<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class addPermissionToRoleCoord extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role = Role::findByName('Coordinador');
      $role->givePermissionTo('audit-edit-patient');
      $role->givePermissionTo('audit-edit-expedient');


    }
}
