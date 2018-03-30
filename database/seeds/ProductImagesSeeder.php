<?php

use App\DatabaseModels\ProductImage;
use Illuminate\Database\Seeder;

class ProductImagesSeeder extends Seeder
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
            ProductImage::truncate();

            for ($i = 1; $i <= 360; $i++)
            {
                for ($j = 1; $j <= rand(1, 7); $j++)
                {
                    $product_image = new ProductImage();
                    $product_image->product_id = $i;
                    $product_image->image_id = rand(1, 7);
                    $product_image->save();
                }
            }

            DB::statement('SET FOREIGN_KEY_CHECKS=1');
            DB::commit();
        }
        catch (Exception $e)
        {
            DB::rollBack();
        }
    }
}
