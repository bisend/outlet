<?php

use App\DatabaseModels\Product;
use App\DatabaseModels\ProductSize;
use App\DatabaseModels\Size;
use Illuminate\Database\Seeder;

class ProductSizesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        ProductSize::truncate();
        DB::beginTransaction();

            for ($i = 1; $i <= 360; $i++)
            {
                if ($i <= 30)
                {
                    for ($j = 53; $j <= 60; $j++)
                    {
                        $product_size = new ProductSize();
                        $product_size->product_id = $i;
                        $product_size->size_id = $j;
                        $product_size->save();
                    }
                }

                if ($i > 30 && $i <= 60)
                {
                    for ($j = 61; $j <= 70; $j++)
                    {
                        $product_size = new ProductSize();
                        $product_size->product_id = $i;
                        $product_size->size_id = $j;
                        $product_size->save();
                    }
                }

                if ($i > 60 && $i <= 90)
                {
                    for ($j = 1; $j <= 12; $j++)
                    {
                        $product_size = new ProductSize();
                        $product_size->product_id = $i;
                        $product_size->size_id = $j;
                        $product_size->save();
                    }
                }

                if ($i > 90 && $i <= 120)
                {
                    for ($j = 7; $j <= 17; $j++)
                    {
                        $product_size = new ProductSize();
                        $product_size->product_id = $i;
                        $product_size->size_id = $j;
                        $product_size->save();
                    }
                }

                if ($i > 120 && $i <= 150)
                {
                    for ($j = 31; $j <= 50; $j++)
                    {
                        $product_size = new ProductSize();
                        $product_size->product_id = $i;
                        $product_size->size_id = $j;
                        $product_size->save();
                    }
                }

                if ($i > 150 && $i <= 180)
                {
                    for ($j = 42; $j <= 61; $j++)
                    {
                        $product_size = new ProductSize();
                        $product_size->product_id = $i;
                        $product_size->size_id = $j;
                        $product_size->save();
                    }
                }

                if ($i > 180 && $i <= 210)
                {
                    for ($j = 53; $j <= 62; $j++)
                    {
                        $product_size = new ProductSize();
                        $product_size->product_id = $i;
                        $product_size->size_id = $j;
                        $product_size->save();
                    }
                }

                if ($i > 210 && $i <= 240)
                {
                    for ($j = 63; $j <= 81; $j++)
                    {
                        $product_size = new ProductSize();
                        $product_size->product_id = $i;
                        $product_size->size_id = $j;
                        $product_size->save();
                    }
                }

                if ($i > 240 && $i <= 270)
                {
                    for ($j = 63; $j <= 75; $j++)
                    {
                        $product_size = new ProductSize();
                        $product_size->product_id = $i;
                        $product_size->size_id = $j;
                        $product_size->save();
                    }
                }

                if ($i > 270 && $i <= 300)
                {
                    for ($j = 61; $j <= 75; $j++)
                    {
                        $product_size = new ProductSize();
                        $product_size->product_id = $i;
                        $product_size->size_id = $j;
                        $product_size->save();
                    }
                }

                if ($i > 300 && $i <= 330)
                {
                    for ($j = 59; $j <= 77; $j++)
                    {
                        $product_size = new ProductSize();
                        $product_size->product_id = $i;
                        $product_size->size_id = $j;
                        $product_size->save();
                    }
                }

                if ($i > 330 && $i <= 360)
                {
                    for ($j = 57; $j <= 81; $j++)
                    {
                        $product_size = new ProductSize();
                        $product_size->product_id = $i;
                        $product_size->size_id = $j;
                        $product_size->save();
                    }
                }
            }

        DB::commit();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

    }
}
