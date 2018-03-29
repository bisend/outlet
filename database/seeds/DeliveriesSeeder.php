<?php

use App\DatabaseModels\Delivery;
use Illuminate\Database\Seeder;

class DeliveriesSeeder extends Seeder
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
            Delivery::truncate();

            $deliveries = [
                0 => [
                    'name_ru' => 'Новая почта',
                    'name_uk' => 'Нова пошта',
                    'slug' => str_slug('Новая почта'),
                ],
                1 => [
                    'name_ru' => 'Автолюкс',
                    'name_uk' => 'Автолюкс',
                    'slug' => str_slug('Автолюкс'),
                ],
                2 => [
                    'name_ru' => 'Интайм',
                    'name_uk' => 'Інтайм',
                    'slug' => str_slug('Интайм'),
                ],
                3 => [
                    'name_ru' => 'Самовывоз',
                    'name_uk' => 'Самовивіз',
                    'slug' => str_slug('Самовывоз'),
                ]
            ];

            foreach ($deliveries as $key => $delivery)
            {
                $model = new Delivery();
                $model->name_uk = $delivery['name_uk'];
                $model->name_ru = $delivery['name_ru'];
                $model->slug = $delivery['slug'];
                $model->save();
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
