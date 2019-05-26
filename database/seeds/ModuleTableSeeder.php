<?php

use Illuminate\Database\Seeder;
use App\ModuleType;
use App\ModuleCategory;
use App\Module;
use Faker\Factory as Faker;

class ModuleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //factory(Module::class, 120)->create();

    //   $moduletypes = ModuleType::all();
    //   $modulecategories = ModuleCategory::all();
    //   $faker = Faker::create();
    //
    // foreach ($modulecategories as $modulecategory) {
    //   foreach ($moduletypes as $moduletype) {
    //
    //
    //       $Module = new Module;
    //       $Module->module_type_id = $moduletype->id;
    //       $Module->module_category_id = $modulecategory->id;
    //       $Module->price = $faker->randomNumber(4,false);
    //       $Module->save();
    //
    //     }
    //   }
    DB::table('modules')->insert(['module_type_id' => 1,'module_category_id'=>1,'price'=>24699]);
DB::table('modules')->insert(['module_type_id' => 2,'module_category_id'=>1,'price'=>16018]);
DB::table('modules')->insert(['module_type_id' => 3,'module_category_id'=>1,'price'=>26941]);
DB::table('modules')->insert(['module_type_id' => 4,'module_category_id'=>1,'price'=>18471]);
DB::table('modules')->insert(['module_type_id' => 5,'module_category_id'=>1,'price'=>24187]);
DB::table('modules')->insert(['module_type_id' => 6,'module_category_id'=>1,'price'=>16070]);
DB::table('modules')->insert(['module_type_id' => 7,'module_category_id'=>1,'price'=>24187]);
DB::table('modules')->insert(['module_type_id' => 8,'module_category_id'=>1,'price'=>16070]);
DB::table('modules')->insert(['module_type_id' => 9,'module_category_id'=>1,'price'=>24445]);
DB::table('modules')->insert(['module_type_id' => 10,'module_category_id'=>1,'price'=>16041]);
DB::table('modules')->insert(['module_type_id' => 11,'module_category_id'=>1,'price'=>24445]);
DB::table('modules')->insert(['module_type_id' => 12,'module_category_id'=>1,'price'=>16041]);
DB::table('modules')->insert(['module_type_id' => 13,'module_category_id'=>1,'price'=>41754.93]);
DB::table('modules')->insert(['module_type_id' => 14,'module_category_id'=>1,'price'=>30126.31]);
DB::table('modules')->insert(['module_type_id' => 15,'module_category_id'=>1,'price'=>37832.34]);
DB::table('modules')->insert(['module_type_id' => 16,'module_category_id'=>1,'price'=>41277.93]);
DB::table('modules')->insert(['module_type_id' => 17,'module_category_id'=>1,'price'=>34610]);
DB::table('modules')->insert(['module_type_id' => 18,'module_category_id'=>1,'price'=>34379.39]);
DB::table('modules')->insert(['module_type_id' => 19,'module_category_id'=>1,'price'=>35400.56]);
DB::table('modules')->insert(['module_type_id' => 20,'module_category_id'=>1,'price'=>47425.92]);
DB::table('modules')->insert(['module_type_id' => 21,'module_category_id'=>1,'price'=>50834.42]);
DB::table('modules')->insert(['module_type_id' => 22,'module_category_id'=>1,'price'=>44915]);
DB::table('modules')->insert(['module_type_id' => 23,'module_category_id'=>1,'price'=>43447.63]);
DB::table('modules')->insert(['module_type_id' => 24,'module_category_id'=>1,'price'=>44554.04]);
DB::table('modules')->insert(['module_type_id' => 25,'module_category_id'=>1,'price'=>22437.75]);
DB::table('modules')->insert(['module_type_id' => 26,'module_category_id'=>1,'price'=>28790.81]);
DB::table('modules')->insert(['module_type_id' => 27,'module_category_id'=>1,'price'=>21606]);
DB::table('modules')->insert(['module_type_id' => 28,'module_category_id'=>1,'price'=>27898]);
DB::table('modules')->insert(['module_type_id' => 29,'module_category_id'=>1,'price'=>11348]);
DB::table('modules')->insert(['module_type_id' => 30,'module_category_id'=>1,'price'=>475]);
DB::table('modules')->insert(['module_type_id' => 31,'module_category_id'=>1,'price'=>10924]);
DB::table('modules')->insert(['module_type_id' => 32,'module_category_id'=>1,'price'=>427]);
DB::table('modules')->insert(['module_type_id' => 33,'module_category_id'=>1,'price'=>18726]);
DB::table('modules')->insert(['module_type_id' => 34,'module_category_id'=>1,'price'=>4166]);
DB::table('modules')->insert(['module_type_id' => 35,'module_category_id'=>1,'price'=>2486]);
DB::table('modules')->insert(['module_type_id' => 36,'module_category_id'=>1,'price'=>17023]);
DB::table('modules')->insert(['module_type_id' => 37,'module_category_id'=>1,'price'=>23836]);
DB::table('modules')->insert(['module_type_id' => 38,'module_category_id'=>1,'price'=>123559.2]);
DB::table('modules')->insert(['module_type_id' => 39,'module_category_id'=>1,'price'=>115]);
DB::table('modules')->insert(['module_type_id' => 40,'module_category_id'=>1,'price'=>16.47]);
DB::table('modules')->insert(['module_type_id' => 1,'module_category_id'=>2,'price'=>20746]);
DB::table('modules')->insert(['module_type_id' => 2,'module_category_id'=>2,'price'=>13478]);
DB::table('modules')->insert(['module_type_id' => 3,'module_category_id'=>2,'price'=>22619]);
DB::table('modules')->insert(['module_type_id' => 4,'module_category_id'=>2,'price'=>15503]);
DB::table('modules')->insert(['module_type_id' => 5,'module_category_id'=>2,'price'=>20335]);
DB::table('modules')->insert(['module_type_id' => 6,'module_category_id'=>2,'price'=>13511]);
DB::table('modules')->insert(['module_type_id' => 7,'module_category_id'=>2,'price'=>20335]);
DB::table('modules')->insert(['module_type_id' => 8,'module_category_id'=>2,'price'=>13511]);
DB::table('modules')->insert(['module_type_id' => 9,'module_category_id'=>2,'price'=>20534]);
DB::table('modules')->insert(['module_type_id' => 10,'module_category_id'=>2,'price'=>13478]);
DB::table('modules')->insert(['module_type_id' => 11,'module_category_id'=>2,'price'=>20534]);
DB::table('modules')->insert(['module_type_id' => 12,'module_category_id'=>2,'price'=>13478]);
DB::table('modules')->insert(['module_type_id' => 13,'module_category_id'=>2,'price'=>35063]);
DB::table('modules')->insert(['module_type_id' => 14,'module_category_id'=>2,'price'=>25319.66]);
DB::table('modules')->insert(['module_type_id' => 15,'module_category_id'=>2,'price'=>31783.86]);
DB::table('modules')->insert(['module_type_id' => 16,'module_category_id'=>2,'price'=>34657.81]);
DB::table('modules')->insert(['module_type_id' => 17,'module_category_id'=>2,'price'=>29077]);
DB::table('modules')->insert(['module_type_id' => 18,'module_category_id'=>2,'price'=>28890.04]);
DB::table('modules')->insert(['module_type_id' => 19,'module_category_id'=>2,'price'=>29748.16]);
DB::table('modules')->insert(['module_type_id' => 20,'module_category_id'=>2,'price'=>39850.18]);
DB::table('modules')->insert(['module_type_id' => 21,'module_category_id'=>2,'price'=>42717.57]);
DB::table('modules')->insert(['module_type_id' => 22,'module_category_id'=>2,'price'=>37696]);
DB::table('modules')->insert(['module_type_id' => 23,'module_category_id'=>2,'price'=>36487.48]);
DB::table('modules')->insert(['module_type_id' => 24,'module_category_id'=>2,'price'=>37416.64]);
DB::table('modules')->insert(['module_type_id' => 25,'module_category_id'=>2,'price'=>18864.61]);
DB::table('modules')->insert(['module_type_id' => 26,'module_category_id'=>2,'price'=>23058.68]);
DB::table('modules')->insert(['module_type_id' => 27,'module_category_id'=>2,'price'=>17958]);
DB::table('modules')->insert(['module_type_id' => 28,'module_category_id'=>2,'price'=>23430]);
DB::table('modules')->insert(['module_type_id' => 1,'module_category_id'=>3,'price'=>15797]);
DB::table('modules')->insert(['module_type_id' => 2,'module_category_id'=>3,'price'=>10271]);
DB::table('modules')->insert(['module_type_id' => 3,'module_category_id'=>3,'price'=>17255]);
DB::table('modules')->insert(['module_type_id' => 4,'module_category_id'=>3,'price'=>11838]);
DB::table('modules')->insert(['module_type_id' => 5,'module_category_id'=>3,'price'=>15494]);
DB::table('modules')->insert(['module_type_id' => 6,'module_category_id'=>3,'price'=>10278]);
DB::table('modules')->insert(['module_type_id' => 7,'module_category_id'=>3,'price'=>15494]);
DB::table('modules')->insert(['module_type_id' => 8,'module_category_id'=>3,'price'=>10278]);
DB::table('modules')->insert(['module_type_id' => 9,'module_category_id'=>3,'price'=>15636]);
DB::table('modules')->insert(['module_type_id' => 10,'module_category_id'=>3,'price'=>10271]);
DB::table('modules')->insert(['module_type_id' => 11,'module_category_id'=>3,'price'=>15636]);
DB::table('modules')->insert(['module_type_id' => 12,'module_category_id'=>3,'price'=>10271]);
DB::table('modules')->insert(['module_type_id' => 13,'module_category_id'=>3,'price'=>27885.33]);
DB::table('modules')->insert(['module_type_id' => 14,'module_category_id'=>3,'price'=>20167.85]);
DB::table('modules')->insert(['module_type_id' => 15,'module_category_id'=>3,'price'=>25340.95]);
DB::table('modules')->insert(['module_type_id' => 16,'module_category_id'=>3,'price'=>26424.59]);
DB::table('modules')->insert(['module_type_id' => 17,'module_category_id'=>3,'price'=>22135]);
DB::table('modules')->insert(['module_type_id' => 18,'module_category_id'=>3,'price'=>22445.23]);
DB::table('modules')->insert(['module_type_id' => 19,'module_category_id'=>3,'price'=>23111.92]);
DB::table('modules')->insert(['module_type_id' => 20,'module_category_id'=>3,'price'=>30332.35]);
DB::table('modules')->insert(['module_type_id' => 21,'module_category_id'=>3,'price'=>33011.28]);
DB::table('modules')->insert(['module_type_id' => 22,'module_category_id'=>3,'price'=>28718]);
DB::table('modules')->insert(['module_type_id' => 23,'module_category_id'=>3,'price'=>27816.12]);
DB::table('modules')->insert(['module_type_id' => 24,'module_category_id'=>3,'price'=>28524.47]);
DB::table('modules')->insert(['module_type_id' => 25,'module_category_id'=>3,'price'=>17361.51]);
DB::table('modules')->insert(['module_type_id' => 26,'module_category_id'=>3,'price'=>22584.45]);
DB::table('modules')->insert(['module_type_id' => 27,'module_category_id'=>3,'price'=>16598]);
DB::table('modules')->insert(['module_type_id' => 28,'module_category_id'=>3,'price'=>21661]);
DB::table('modules')->insert(['module_type_id' => 41,'module_category_id'=>1,'price'=>0]);




    }
}
