<?php

use App\DatabaseModels\PropertyName;
use Illuminate\Database\Seeder;

class PropertyNamesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try
        {
            DB::beginTransaction();
            DB::statement('SET FOREIGN_KEY_CHECKS=0');
            PropertyName::truncate();

            $property_name = new PropertyName();
            $property_name->name_ru = "";
            $property_name->name_uk = "";
            $property_name->slug = "";
            $property_name->save();

            DB::statement('SET FOREIGN_KEY_CHECKS=1');
            DB::commit();
        }
        catch (Exception $e)
        {
            DB::rollBack();
        }
    }
}
