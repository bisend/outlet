<?php

use App\DatabaseModels\CheckoutPoint;
use Illuminate\Database\Seeder;

class CheckoutPointsSeeder extends Seeder
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
            CheckoutPoint::truncate();

            $checkout_point = new CheckoutPoint();
            $checkout_point->name_ru = "тц Екватор 123123";
            $checkout_point->name_uk = "тц Екватор 123123";
            $checkout_point->slug = str_slug("тц Екватор 123123");
            $checkout_point->save();

            $checkout_point = new CheckoutPoint();
            $checkout_point->name_ru = "тц ZlataPlaza 123123";
            $checkout_point->name_uk = "тц ZlataPlaza 123123";
            $checkout_point->slug = str_slug("тц ZlataPlaza 123123");
            $checkout_point->save();

            $checkout_point = new CheckoutPoint();
            $checkout_point->name_ru = "тц Arena 123123";
            $checkout_point->name_uk = "тц Arena 123123";
            $checkout_point->slug = str_slug("тц Arena 123123");
            $checkout_point->save();

            DB::statement('SET FOREIGN_KEY_CHECKS=1');
            DB::commit();
        }
        catch (Exception $e)
        {
            DB::rollBack();
        }
    }
}
