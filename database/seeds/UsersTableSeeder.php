<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Person;
use App\Auditor;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $users = factory(User::class, 5)->create();

      $users->each(function ($user) {
        $user->assignRole(rand(1,6));
       });

      $user = new App\User();
      $user->password = Hash::make('admin');
      $user->email = 'admin@admin.com';
      $user->name = 'Administrador';
      $user->person_id = Person::inRandomOrder()->first()->id;
      $user->save();
      $user->assignRole('Administrador');

      $user = new App\User();
      $user->password = Hash::make('cliente');
      $user->email = 'cliente@cliente.com';
      $user->name = 'Cliente';
      $user->person_id = Person::inRandomOrder()->first()->id;
      $user->save();
      $user->assignRole('Cliente');

      $user = new App\User();
      $user->password = Hash::make('gerencial');
      $user->email = 'gerencial@gerencial.com';
      $user->name = 'Cliente gerencial';
      $user->person_id = Person::inRandomOrder()->first()->id;
      $user->save();
      $user->assignRole('Cliente gerencial');


    }
}
