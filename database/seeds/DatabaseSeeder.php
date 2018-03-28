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
//        $this->call(CategoriesSeeder::class);
//        $this->call(ProductsSeeder::class);
//        $this->call(ImagesSeeder::class);
//        $this->call(ProductImagesSeeder::class);
//        $this->call(SizesSeeder::class);
//        $this->call(ProductSizesSeeder::class);
        $this->call(PropertyNamesSeeder::class);
    }
}
