<?php

use App\DatabaseModels\OrderStatus;
use Illuminate\Database\Seeder;

class OrderSatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        OrderStatus::truncate();
        DB::beginTransaction();

            $order_status = new OrderStatus();
            $order_status->name_ru = 'Новый';
            $order_status->name_uk = 'Новий';
            $order_status->slug = str_slug('Новый');
            $order_status->is_default = true;
            $order_status->save();

            $order_status = new OrderStatus();
            $order_status->name_ru = 'Принят';
            $order_status->name_uk = 'Прийнято';
            $order_status->slug = str_slug('Принят');
            $order_status->save();

            $order_status = new OrderStatus();
            $order_status->name_ru = 'Отклонен';
            $order_status->name_uk = 'Відхилено';
            $order_status->slug = str_slug('Отклонен');
            $order_status->save();

            $order_status = new OrderStatus();
            $order_status->name_ru = 'Отправлен';
            $order_status->name_uk = 'Відправлено';
            $order_status->slug = str_slug('Отправлен');
            $order_status->save();

            $order_status = new OrderStatus();
            $order_status->name_ru = 'Оплачен';
            $order_status->name_uk = 'Оплачено';
            $order_status->slug = str_slug('Оплачен');
            $order_status->save();

        DB::commit();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

    }
}
