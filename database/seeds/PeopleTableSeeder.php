<?php

use Illuminate\Database\Seeder;
use App\Person;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(Person::class, 100)->create();
      // $person = new App\Person();
      // $person->name = 'Migracion';
      // $person->surname = 'Migracion';
      // $person->dni = 0;
      // $person->save();
    }
}
