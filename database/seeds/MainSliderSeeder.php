<?php

use App\DatabaseModels\MainSlider;
use Illuminate\Database\Seeder;

class MainSliderSeeder extends Seeder
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
            MainSlider::truncate();

            $slide = new MainSlider();
            $slide->image = '/img/main-slider/img-1.jpg';
            $slide->url_ru = '/category';
            $slide->url_uk = '/category';
            $slide->big_text_ru = 'Новая коллекция обуви';
            $slide->big_text_uk = 'Нова колекція взуття';
            $slide->small_text_ru = 'Новая коллекция';
            $slide->small_text_uk = 'Нова колекція';
            $slide->btn_text_ru = 'Посмотреть';
            $slide->btn_text_uk = 'Переглянути';
            $slide->save();

            $slide = new MainSlider();
            $slide->image = '/img/main-slider/img-2.jpg';
            $slide->url_ru = '/category';
            $slide->url_uk = '/category';
            $slide->big_text_ru = 'Новая обувь от Versace';
            $slide->big_text_uk = 'Нове взуття від Versace';
            $slide->small_text_ru = 'Новая коллекция';
            $slide->small_text_uk = 'Нова колекція';
            $slide->btn_text_ru = 'Посмотреть';
            $slide->btn_text_uk = 'Переглянути';
            $slide->save();

            $slide = new MainSlider();
            $slide->image = '/img/main-slider/img-3.jpg';
            $slide->url_ru = '/category';
            $slide->url_uk = '/category';
            $slide->big_text_ru = 'Новая обувь';
            $slide->big_text_uk = 'Нове взуття';
            $slide->small_text_ru = 'Новая коллекция';
            $slide->small_text_uk = 'Нова колекція';
            $slide->btn_text_ru = 'Посмотреть';
            $slide->btn_text_uk = 'Переглянути';
            $slide->save();

            DB::statement('SET FOREIGN_KEY_CHECKS=1');
            DB::commit();
        }
        catch (Exception $e)
        {
            DB::rollBack();
        }
    }
}
