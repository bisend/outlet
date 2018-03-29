<?php

use App\DatabaseModels\ProductPromotion;
use Illuminate\Database\Seeder;

class ProductsPromotionsSeeder extends Seeder
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
            ProductPromotion::truncate();

            for ($i = 1; $i <= 24; $i++)
            {
                $product_promotion = new ProductPromotion();
                $product_promotion->product_id = $i;
                if ($i <= 8)
                {
                    $product_promotion->promotion_id = 2;
                }
                elseif ($i <= 16)
                {
                    $product_promotion->promotion_id = 3;
                }
                elseif ($i <= 24)
                {
                    $product_promotion->promotion_id = 1;
                }
                $product_promotion->save();
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
