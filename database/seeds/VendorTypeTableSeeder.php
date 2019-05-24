<?php

use Illuminate\Database\Seeder;

class VendorTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('vendor_types')->insert(['name' => "Servicio Medico"]);
      DB::table('vendor_types')->insert(['name' => "Transportista"]);
    }
}
