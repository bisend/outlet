<?php

use App\DatabaseModels\Property;
use Illuminate\Database\Seeder;

class PropertiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Property::truncate();
        DB::beginTransaction();

            for ($i = 1; $i <= 360; $i++)
            {
                for ($j = 1; $j <= 6; $j++)
                {
                    if ($j = 1)
                    {
                        $property = new Property();
                        $property->product_id = $i;
                        $property->property_name_id = $j;
                        $property->property_value_id = rand(1, 9);
                        $property->save();
                    }
                    if ($j = 2)
                    {
                        $property = new Property();
                        $property->product_id = $i;
                        $property->property_name_id = $j;
                        $property->property_value_id = rand(26, 34);
                        $property->save();
                    }
                    if ($j = 3)
                    {
                        $property = new Property();
                        $property->product_id = $i;
                        $property->property_name_id = $j;
                        $property->property_value_id = rand(10, 15);
                        $property->save();
                    }
                    //SIZE
                    if ($j = 4)
                    {
                        for ($k = 35; $k <= 64; $k++)
                        {
                            $property = new Property();
                            $property->product_id = $i;
                            $property->property_name_id = $j;
                            $property->property_value_id = $k;
                            $property->save();
                        }
                    }
                    if ($j = 5)
                    {
                        $property = new Property();
                        $property->product_id = $i;
                        $property->property_name_id = $j;
                        $property->property_value_id = rand(16, 21);
                        $property->save();
                    }
                    if ($j = 6)
                    {
                        $property = new Property();
                        $property->product_id = $i;
                        $property->property_name_id = $j;
                        $property->property_value_id = rand(22, 25);
                        $property->save();
                    }
                }
            }

        DB::commit();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

    }
}
