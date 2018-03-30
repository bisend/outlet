<?php

use App\DatabaseModels\Category;
use App\DatabaseModels\Product;
use App\DatabaseModels\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
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
            ProductCategory::truncate();

            $products = Product::all();

            foreach ($products as $product)
            {
                $cat_id = $product->category_id;

                $category = Category::whereId($cat_id)->first();

                if (is_null($category->parent_id))
                {
                    $product_category = new ProductCategory();
                    $product_category->product_id = $product->id;
                    $product_category->category_id = $cat_id;
                    $product_category->save();
                }
                else
                {
                    $product_category = new ProductCategory();
                    $product_category->product_id = $product->id;
                    $product_category->category_id = $cat_id;
                    $product_category->save();

                    $product_category = new ProductCategory();
                    $product_category->product_id = $product->id;
                    $product_category->category_id = $category->parent_id;
                    $product_category->save();
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