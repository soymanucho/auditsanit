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
      factory(Auditor::class, 5)->create();

      $user = new App\User();
      $user->password = Hash::make('auditor');
      $user->email = 'auditor@auditor.com';
    //  $user->name = 'Auditor';
      $user->person_id = Auditor::inRandomOrder()->first()->person_id;
      $user->save();
      $user->assignRole('Auditor');
    }
}
