<?php

use App\DatabaseModels\Size;
use Illuminate\Database\Seeder;

class SizesSeeder extends Seeder
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
            Size::truncate();

            for ($i = 10; $i <= 50; ($i += 0.5))
            {
                $size = new Size();
                $size->name_ru = str_replace(".", ",", "$i");
                $size->name_uk = str_replace(".", ",", "$i");
                $size->slug = str_replace(".", "-", "$i");
                $size->save();
            }

            DB::statement('SET FOREIGN_KEY_CHECKS=1');
            DB::commit();
    }
}
