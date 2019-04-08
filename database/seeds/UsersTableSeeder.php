<?php

use Illuminate\Database\Seeder;
use App\User;

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
      $user->save();
    }
}
