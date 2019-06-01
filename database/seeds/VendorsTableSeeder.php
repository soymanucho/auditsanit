<?php

use Illuminate\Database\Seeder;
use App\Vendor;

class VendorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      DB::table('vendors')->insert(['name' => 'Migración','vendor_type_id'=>1,'snr_category'=>'Migración','jury_person'=>false,'address_id'=>null]);
       //factory(Vendor::class, 15)->create();
    }
}
