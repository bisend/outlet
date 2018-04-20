<?php

use App\DatabaseModels\PropertyName;
use Illuminate\Database\Seeder;

class PropertyNamesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $array = [
                [
                    'name_ru' => 'Материал верха',
                    'name_uk' => 'Матеріал верху'
                ],
                [
                    'name_ru' => 'Внутренний материал',
                    'name_uk' => 'Внутрішній матеріал'
                ],
                [
                    'name_ru' => 'Цвет',
                    'name_uk' => 'Колір'
                ],
                [
                    'name_ru' => 'Размер',
                    'name_uk' => 'Розмір'
                ],
                [
                    'name_ru' => 'Бренд',
                    'name_uk' => 'Бренд'
                ],
                [
                    'name_ru' => 'Сезон',
                    'name_uk' => 'Сезон'
                ],
            ];

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        PropertyName::truncate();
        DB::beginTransaction();

            foreach ($array as $item)
            {
                $property_name = new PropertyName();
                $property_name->name_ru = $item['name_ru'];
                $property_name->name_uk = $item['name_uk'];
                $property_name->slug = str_slug($item['name_ru']);
                $property_name->save();
            }

        DB::commit();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

    }
}
