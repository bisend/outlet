<?php

use App\DatabaseModels\Review;
use Illuminate\Database\Seeder;

class ReviewsSeeder extends Seeder
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
            Review::truncate();

            $faker = Faker\Factory::create();

            for ($i = 1; $i <= 360; $i++)
            {
                for ($j = 1; $j <= 7; $j++)
                {
                    $review = new Review();
                    $review->product_id = $i;
                    $review->is_moderated = true;
                    $review->review = $faker->text(200);
                    $review->name = $faker->name();
                    $review->email = $faker->email;
                    $review->rating = rand(1, 5);
                    $review->save();
                }
            }

            DB::statement('SET FOREIGN_KEY_CHECKS=1');
            DB::commit();
    }
}
