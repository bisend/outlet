<?php

use App\DatabaseModels\Banner;
use Illuminate\Database\Seeder;

class BannersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::beginTransaction();
            DB::statement('SET FOREIGN_KEY_CHECKS=0');
            Banner::truncate();

            $banner = new Banner();
            $banner->image = "/img/products/medium/item-1.jpg";
            $banner->url_ru = '/';
            $banner->url_uk = '/uk';
            $banner->text_ru = 'Мужская обувь';
            $banner->text_uk = 'Чоловіче взуття';
            $banner->btn_text_ru = 'Посмотреть';
            $banner->btn_text_uk = 'Переглянути';
            $banner->save();

            $banner = new Banner();
            $banner->image = "/img/products/medium/item-2.jpg";
            $banner->url_ru = '/';
            $banner->url_uk = '/uk';
            $banner->text_ru = 'Женская обувь';
            $banner->text_uk = 'Жіноче взуття';
            $banner->btn_text_ru = 'Посмотреть';
            $banner->btn_text_uk = 'Переглянути';
            $banner->save();

            $banner = new Banner();
            $banner->image = "/img/products/medium/item-3.jpg";
            $banner->url_ru = '/';
            $banner->url_uk = '/uk';
            $banner->text_ru = 'Для мальчиков';
            $banner->text_uk = 'Для хлопчиків';
            $banner->btn_text_ru = 'Посмотреть';
            $banner->btn_text_uk = 'Переглянути';
            $banner->save();

            $banner = new Banner();
            $banner->image = "/img/products/medium/item-4.jpg";
            $banner->url_ru = '/';
            $banner->url_uk = '/uk';
            $banner->text_ru = 'Для девочек';
            $banner->text_uk = 'Для дівчаток';
            $banner->btn_text_ru = 'Посмотреть';
            $banner->btn_text_uk = 'Переглянути';
            $banner->save();

            $banner = new Banner();
            $banner->image = "/img/products/medium/item-5.jpg";
            $banner->url_ru = '/';
            $banner->url_uk = '/uk';
            $banner->text_ru = 'Распродажа';
            $banner->text_uk = 'Розпродаж';
            $banner->btn_text_ru = 'Посмотреть';
            $banner->btn_text_uk = 'Переглянути';
            $banner->save();

            $banner = new Banner();
            $banner->image = "/img/products/medium/item-6.jpg";
            $banner->url_ru = '/';
            $banner->url_uk = '/uk';
            $banner->text_ru = 'Новинки';
            $banner->text_uk = 'Новинки';
            $banner->btn_text_ru = 'Посмотреть';
            $banner->btn_text_uk = 'Переглянути';
            $banner->save();

            DB::statement('SET FOREIGN_KEY_CHECKS=1');
            DB::commit();
    }
}
