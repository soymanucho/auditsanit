<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Person;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(User::class, 5)->create();

      $user = new App\User();
      $user->password = Hash::make('admin');
      $user->email = 'admin@admin.com';
      $user->name = 'Administrador';
      $user->person_id = Person::inRandomOrder()->first()->id;
      $user->save();

      $user = new App\User();
      $user->password = Hash::make('auditor');
      $user->email = 'auditor@auditor.com';
      $user->name = 'Auditor';
      $user->person_id = Person::inRandomOrder()->first()->id;
      $user->save();
    }
}
