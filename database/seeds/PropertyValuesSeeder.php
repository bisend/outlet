<?php

use App\DatabaseModels\PropertyValue;
use Illuminate\Database\Seeder;

class PropertyValuesSeeder extends Seeder
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
                    'name_ru' => 'Болонья',
                    'name_uk' => 'Болонья'
                ],
                [
                    'name_ru' => 'Велюр',
                    'name_uk' => 'Велюр'
                ],
                [
                    'name_ru' => 'Войлок',
                    'name_uk' => 'Войлок'
                ],
                [
                    'name_ru' => 'Дубленка',
                    'name_uk' => 'Дублянка'
                ],
                [
                    'name_ru' => 'Замша',
                    'name_uk' => 'Замша'
                ],
                [
                    'name_ru' => 'Кожа',
                    'name_uk' => 'Шкіра'
                ],
                [
                    'name_ru' => 'ПВХ',
                    'name_uk' => 'ПВХ'
                ],
                [
                    'name_ru' => 'Хлопок',
                    'name_uk' => 'Бавовна'
                ],
                [
                    'name_ru' => 'Шерсть',
                    'name_uk' => 'Вовна'
                ],
                [
                    'name_ru' => 'Белый',
                    'name_uk' => 'Білий'
                ],
                [
                    'name_ru' => 'Бежевый',
                    'name_uk' => 'Бежевий'
                ],
                [
                    'name_ru' => 'Серый',
                    'name_uk' => 'Сірий'
                ],
                [
                    'name_ru' => 'Хаки',
                    'name_uk' => 'Хакі'
                ],
                [
                    'name_ru' => 'Черный',
                    'name_uk' => 'Чорний'
                ],
                [
                    'name_ru' => 'Красный',
                    'name_uk' => 'Червоний'
                ],
                [
                    'name_ru' => 'Affex',
                    'name_uk' => 'Affex'
                ],
                [
                    'name_ru' => 'Aldo',
                    'name_uk' => 'Aldo'
                ],
                [
                    'name_ru' => 'Affre',
                    'name_uk' => 'Affre'
                ],
                [
                    'name_ru' => 'Balex',
                    'name_uk' => 'Balex'
                ],
                [
                    'name_ru' => 'Barracuda',
                    'name_uk' => 'Barracuda'
                ],
                [
                    'name_ru' => 'Versace',
                    'name_uk' => 'Versace'
                ],
                [
                    'name_ru' => 'Демисезон',
                    'name_uk' => 'Демисезон'
                ],
                [
                    'name_ru' => 'Зима',
                    'name_uk' => 'Зима'
                ],
                [
                    'name_ru' => 'Лето',
                    'name_uk' => 'Літо'
                ],
                [
                    'name_ru' => 'Мульти',
                    'name_uk' => 'Мульти'
                ],
            ];

            $array2 = [
                [
                    'name_ru' => '30',
                    'name_uk' => '30',
                    'slug' => '30'
                ],
                [
                    'name_ru' => '30,5',
                    'name_uk' => '30,5',
                    'slug' => '30-5'
                ],
                [
                    'name_ru' => '31',
                    'name_uk' => '31',
                    'slug' => '31'
                ],
                [
                    'name_ru' => '31,5',
                    'name_uk' => '31,5',
                    'slug' => '31-5'
                ],
                [
                    'name_ru' => '32',
                    'name_uk' => '32',
                    'slug' => '32'
                ],
                [
                    'name_ru' => '32,5',
                    'name_uk' => '32,5',
                    'slug' => '32-5'
                ],
                [
                    'name_ru' => '33',
                    'name_uk' => '33',
                    'slug' => '33'
                ],
                [
                    'name_ru' => '33,5',
                    'name_uk' => '33,5',
                    'slug' => '33-5'
                ],
                [
                    'name_ru' => '34',
                    'name_uk' => '34',
                    'slug' => '34'
                ],
                [
                    'name_ru' => '34,5',
                    'name_uk' => '34,5',
                    'slug' => '34-5'
                ],
                [
                    'name_ru' => '35',
                    'name_uk' => '35',
                    'slug' => '35'
                ],
                [
                    'name_ru' => '35,5',
                    'name_uk' => '35,5',
                    'slug' => '35-5'
                ],
                [
                    'name_ru' => '36',
                    'name_uk' => '36',
                    'slug' => '36'
                ],
                [
                    'name_ru' => '36,5',
                    'name_uk' => '36,5',
                    'slug' => '36-5'
                ],
                [
                    'name_ru' => '37',
                    'name_uk' => '37',
                    'slug' => '37'
                ],
                [
                    'name_ru' => '37,5',
                    'name_uk' => '37,5',
                    'slug' => '37-5'
                ],
                [
                    'name_ru' => '38',
                    'name_uk' => '38',
                    'slug' => '38'
                ],
                [
                    'name_ru' => '38,5',
                    'name_uk' => '38,5',
                    'slug' => '38-5'
                ],
                [
                    'name_ru' => '39',
                    'name_uk' => '39',
                    'slug' => '39'
                ],
                [
                    'name_ru' => '39,5',
                    'name_uk' => '39,5',
                    'slug' => '39-5'
                ],
                [
                    'name_ru' => '40',
                    'name_uk' => '40',
                    'slug' => '40'
                ],
                [
                    'name_ru' => '41,5',
                    'name_uk' => '41,5',
                    'slug' => '41-5'
                ],
                [
                    'name_ru' => '42',
                    'name_uk' => '42',
                    'slug' => '42'
                ],
                [
                    'name_ru' => '42,5',
                    'name_uk' => '42,5',
                    'slug' => '42-5'
                ],
                [
                    'name_ru' => '43',
                    'name_uk' => '43',
                    'slug' => '43'
                ],
                [
                    'name_ru' => '43,5',
                    'name_uk' => '43,5',
                    'slug' => '43-5'
                ],
                [
                    'name_ru' => '44',
                    'name_uk' => '44',
                    'slug' => '44'
                ],
                [
                    'name_ru' => '44,5',
                    'name_uk' => '44,5',
                    'slug' => '44-5'
                ],
                [
                    'name_ru' => '45',
                    'name_uk' => '45',
                    'slug' => '45'
                ],
                [
                    'name_ru' => '45,5',
                    'name_uk' => '45,5',
                    'slug' => '45-5'
                ],
                [
                    'name_ru' => '46',
                    'name_uk' => '46',
                    'slug' => '46'
                ],
                [
                    'name_ru' => '46,5',
                    'name_uk' => '46,5',
                    'slug' => '46-5'
                ],
                [
                    'name_ru' => '47',
                    'name_uk' => '47',
                    'slug' => '47'
                ],
                [
                    'name_ru' => '47,5',
                    'name_uk' => '47,5',
                    'slug' => '47-5'
                ],
                [
                    'name_ru' => '48',
                    'name_uk' => '48',
                    'slug' => '48'
                ],
                [
                    'name_ru' => '48,5',
                    'name_uk' => '48,5',
                    'slug' => '48-5'
                ],
                [
                    'name_ru' => '49',
                    'name_uk' => '49',
                    'slug' => '49'
                ],
                [
                    'name_ru' => '49,5',
                    'name_uk' => '49,5',
                    'slug' => '49-5'
                ],
                [
                    'name_ru' => '50',
                    'name_uk' => '50',
                    'slug' => '50'
                ],
            ];

            DB::beginTransaction();
            DB::statement('SET FOREIGN_KEY_CHECKS=0');
            PropertyValue::truncate();

            foreach ($array as $item)
            {
                $property_value = new PropertyValue();
                $property_value->name_ru = $item['name_ru'];
                $property_value->name_uk = $item['name_uk'];
                $property_value->slug = str_slug($item['name_ru']);
                $property_value->save();
            }

            foreach ($array2 as $item)
            {
                $property_value = new PropertyValue();
                $property_value->name_ru = $item['name_ru'];
                $property_value->name_uk = $item['name_uk'];
                $property_value->slug = $item['slug'];
                $property_value->save();
            }

            DB::statement('SET FOREIGN_KEY_CHECKS=1');
            DB::commit();
    }
}
