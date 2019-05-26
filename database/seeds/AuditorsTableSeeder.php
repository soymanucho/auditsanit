<?php

use Illuminate\Database\Seeder;
use App\Auditor;
use App\User;
use App\Person;
class AuditorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
              // factory(Auditor::class, 5)->create();

      $user = new App\User();
      $user->password = Hash::make('migracion');
      $user->email = 'migracion@migracion.com';
      $user->person_id = 1;
      $user->save();
      $user->assignRole('Auditor');

      $auditor = new App\Auditor();
      $auditor->user_id = $user->id;
      $auditor->person_id = 1;
      $auditor->save();
    }
}
