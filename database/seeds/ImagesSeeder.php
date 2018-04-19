<?php

use App\DatabaseModels\Image;
use Illuminate\Database\Seeder;

class ImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            'item-1.jpg',
            'item-2.jpg',
            'item-3.jpg',
            'item-4.jpg',
            'item-5.jpg',
            'item-6.jpg',
            'item-7.jpg',
        ];


            DB::beginTransaction();
            DB::statement('SET FOREIGN_KEY_CHECKS=0');
            Image::truncate();

            foreach ($array as $arr_img)
            {
                $image = new Image();
                $image->original = "/img/products/original/$arr_img";
                $image->big = "/img/products/big/$arr_img";
                $image->medium = "/img/products/medium/$arr_img";
                $image->small = "/img/products/small/$arr_img";
                $image->save();
            }

            DB::statement('SET FOREIGN_KEY_CHECKS=1');
            DB::commit();

    }
}
