<?php

use App\DatabaseModels\Payment;
use Illuminate\Database\Seeder;

class PaymentsSeeder extends Seeder
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
            Payment::truncate();

            $payments = [
                0 => [
                    'name_ru' => 'Безналичный расчет',
                    'name_uk' => 'Безготівковий розрахунок',
                    'slug' => str_slug('Безналичный расчет'),
                ],
                1 => [
                    'name_ru' => 'Наложенный платеж',
                    'name_uk' => 'Накладений платіж',
                    'slug' => str_slug('Наложенный платеж'),
                ],
                2 => [
                    'name_ru' => 'Наличными',
                    'name_uk' => 'Готівкою',
                    'slug' => str_slug('Наличными'),
                ]
            ];

            foreach ($payments as $key => $payment)
            {
                $model = new Payment();
                $model->name_uk = $payment['name_uk'];
                $model->name_ru = $payment['name_ru'];
                $model->slug = $payment['slug'];
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
