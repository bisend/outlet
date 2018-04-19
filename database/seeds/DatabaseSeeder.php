<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriesSeeder::class);
        $this->call(ProductsSeeder::class);
        $this->call(ImagesSeeder::class);
        $this->call(ProductImagesSeeder::class);
        $this->call(SizesSeeder::class);
        $this->call(ProductSizesSeeder::class);
        $this->call(PropertyNamesSeeder::class);
        $this->call(PropertyValuesSeeder::class);
        $this->call(PropertiesSeeder::class);
        $this->call(ProductCategorySeeder::class);
        $this->call(PromotionsSeeder::class);
        $this->call(ProductsPromotionsSeeder::class);
        $this->call(OrderSatusesSeeder::class);
        $this->call(CheckoutPointsSeeder::class);
        $this->call(NpDeliveryTypesSeeder::class);
        $this->call(DeliveriesSeeder::class);
        $this->call(PaymentsSeeder::class);
        $this->call(ReviewsSeeder::class);
        $this->call(MainSliderSeeder::class);
        $this->call(BannersSeeder::class);
        $this->call(MetaTagsSeeder::class);
    }
}
