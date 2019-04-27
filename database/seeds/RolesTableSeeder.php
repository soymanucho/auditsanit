<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

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
      $role1 = Role::create(['name' => 'Administrador']);
      $role1->save();
      $role2 = Role::create(['name' => 'Backoffice']);
      $role2->save();
      $role3 = Role::create(['name' => 'Coordinador']);
      $role3->save();
      $role4 = Role::create(['name' => 'Auditor']);
      $role4->save();
      $role5 = Role::create(['name' => 'Cliente']);
      $role5->save();
      $role6 = Role::create(['name' => 'Cliente gerencial']);
      $role6->save();
    }
}
