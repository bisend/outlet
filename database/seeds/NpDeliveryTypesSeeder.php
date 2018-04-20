<?php

use App\DatabaseModels\DeliveryType;
use Illuminate\Database\Seeder;

class NpDeliveryTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DeliveryType::truncate();
        DB::beginTransaction();

            $delivery_type = new DeliveryType();
            $delivery_type->name_ru = 'Адресная доставка';
            $delivery_type->name_uk = 'Адресна доставка';
            $delivery_type->slug = str_slug('Адресная доставка');
            $delivery_type->save();

            $delivery_type = new DeliveryType();
            $delivery_type->name_ru = 'Номер отделения';
            $delivery_type->name_uk = 'Номер відділення';
            $delivery_type->slug = str_slug('Номер отделения');
            $delivery_type->save();

        DB::commit();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

    }
}
