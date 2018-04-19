<?php

use App\DatabaseModels\Product;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
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
            Product::truncate();

            for ($i = 1; $i <= 12; $i++)
            {
                if ($i = 1)
                {
                    for ($j = 1; $j <= 30; $j++)
                    {
                        $product = new Product();
                        $product->category_id = $i;
                        $product->name_ru = "Женская обувь $j";
                        $product->name_uk = "Жіноче взуття $j";
                        $product->slug = str_slug("Женская обувь $j");
                        $product->price = rand(100.00, 5000.00);
                        $product->description_ru = "lorem ipsum ru $j";
                        $product->description_uk = "lorem ipsum uk $j";
                        $product->vendor_code = str_random(10);
                        $product->rating = rand(0, 5);
                        $product->save();
                        $product->meta_title_ru = "$product->name_ru купить в интернет-магазине Outlet";
                        $product->meta_title_uk = "$product->name_uk купить в интернет-магазине Outlet";
                        $product->meta_description_ru = "Купить $product->name_ru за лучшими ценами в интернет-магазине Outlet ? (068) 000 00 00 ? (093) 000 00 00 ? Бесплатная доставка по Украине";
                        $product->meta_description_uk = "Купити $product->name_uk за найкращими цiнами в iнтернет-магазині Outlet ? (068) 000 00 00 ? (093) 000 00 00 ? Безкоштовна доставка по Україні";
                        $product->meta_keywords_ru = "$product->name_ru купить в интернет-магазине Outlet";
                        $product->meta_keywords_uk = "$product->name_uk купить в интернет-магазине Outlet";
                        $product->meta_h1_ru = $product->name_ru;
                        $product->meta_h1_uk = $product->name_uk;
                        $product->save();
                    }
                }

                if ($i = 2)
                {
                    for ($j = 1; $j <= 30; $j++)
                    {
                        $product = new Product();
                        $product->category_id = $i;
                        $product->name_ru = "Мужская обувь $j";
                        $product->name_uk = "Чоловіче взуття $j";
                        $product->slug = str_slug("Мужская обувь $j");
                        $product->price = rand(100.00, 5000.00);
                        $product->description_ru = "lorem ipsum ru $j";
                        $product->description_uk = "lorem ipsum uk $j";
                        $product->vendor_code = str_random(10);
                        $product->rating = rand(0, 5);
                        $product->save();
                        $product->meta_title_ru = "$product->name_ru купить в интернет-магазине Outlet";
                        $product->meta_title_uk = "$product->name_uk купить в интернет-магазине Outlet";
                        $product->meta_description_ru = "Купить $product->name_ru за лучшими ценами в интернет-магазине Outlet ? (068) 000 00 00 ? (093) 000 00 00 ? Бесплатная доставка по Украине";
                        $product->meta_description_uk = "Купити $product->name_uk за найкращими цiнами в iнтернет-магазині Outlet ? (068) 000 00 00 ? (093) 000 00 00 ? Безкоштовна доставка по Україні";
                        $product->meta_keywords_ru = "$product->name_ru купить в интернет-магазине Outlet";
                        $product->meta_keywords_uk = "$product->name_uk купить в интернет-магазине Outlet";
                        $product->meta_h1_ru = $product->name_ru;
                        $product->meta_h1_uk = $product->name_uk;
                        $product->save();
                    }
                }

                if ($i = 3)
                {
                    for ($j = 1; $j <= 30; $j++)
                    {
                        $product = new Product();
                        $product->category_id = $i;
                        $product->name_ru = "Обувь для девочек $j";
                        $product->name_uk = "Взуття для дівчаток $j";
                        $product->slug = str_slug("Обувь для девочек $j");
                        $product->price = rand(100.00, 5000.00);
                        $product->description_ru = "lorem ipsum ru $j";
                        $product->description_uk = "lorem ipsum uk $j";
                        $product->vendor_code = str_random(10);
                        $product->rating = rand(0, 5);
                        $product->save();
                        $product->meta_title_ru = "$product->name_ru купить в интернет-магазине Outlet";
                        $product->meta_title_uk = "$product->name_uk купить в интернет-магазине Outlet";
                        $product->meta_description_ru = "Купить $product->name_ru за лучшими ценами в интернет-магазине Outlet ? (068) 000 00 00 ? (093) 000 00 00 ? Бесплатная доставка по Украине";
                        $product->meta_description_uk = "Купити $product->name_uk за найкращими цiнами в iнтернет-магазині Outlet ? (068) 000 00 00 ? (093) 000 00 00 ? Безкоштовна доставка по Україні";
                        $product->meta_keywords_ru = "$product->name_ru купить в интернет-магазине Outlet";
                        $product->meta_keywords_uk = "$product->name_uk купить в интернет-магазине Outlet";
                        $product->meta_h1_ru = $product->name_ru;
                        $product->meta_h1_uk = $product->name_uk;
                        $product->save();
                    }
                }

                if ($i = 4)
                {
                    for ($j = 1; $j <= 30; $j++)
                    {
                        $product = new Product();
                        $product->category_id = $i;
                        $product->name_ru = "Обувь для мальчиков $j";
                        $product->name_uk = "Взуття для хлопчиків $j";
                        $product->slug = str_slug("Обувь для мальчиков $j");
                        $product->price = rand(100.00, 5000.00);
                        $product->description_ru = "lorem ipsum ru $j";
                        $product->description_uk = "lorem ipsum uk $j";
                        $product->vendor_code = str_random(10);
                        $product->rating = rand(0, 5);
                        $product->save();
                        $product->meta_title_ru = "$product->name_ru купить в интернет-магазине Outlet";
                        $product->meta_title_uk = "$product->name_uk купить в интернет-магазине Outlet";
                        $product->meta_description_ru = "Купить $product->name_ru за лучшими ценами в интернет-магазине Outlet ? (068) 000 00 00 ? (093) 000 00 00 ? Бесплатная доставка по Украине";
                        $product->meta_description_uk = "Купити $product->name_uk за найкращими цiнами в iнтернет-магазині Outlet ? (068) 000 00 00 ? (093) 000 00 00 ? Безкоштовна доставка по Україні";
                        $product->meta_keywords_ru = "$product->name_ru купить в интернет-магазине Outlet";
                        $product->meta_keywords_uk = "$product->name_uk купить в интернет-магазине Outlet";
                        $product->meta_h1_ru = $product->name_ru;
                        $product->meta_h1_uk = $product->name_uk;
                        $product->save();
                    }
                }

                if ($i = 5)
                {
                    for ($j = 1; $j <= 30; $j++)
                    {
                        $product = new Product();
                        $product->category_id = $i;
                        $product->name_ru = "Балетки $j";
                        $product->name_uk = "Балетки $j";
                        $product->slug = str_slug("Балетки $j");
                        $product->price = rand(100.00, 5000.00);
                        $product->description_ru = "lorem ipsum ru $j";
                        $product->description_uk = "lorem ipsum uk $j";
                        $product->vendor_code = str_random(10);
                        $product->rating = rand(0, 5);
                        $product->save();
                        $product->meta_title_ru = "$product->name_ru купить в интернет-магазине Outlet";
                        $product->meta_title_uk = "$product->name_uk купить в интернет-магазине Outlet";
                        $product->meta_description_ru = "Купить $product->name_ru за лучшими ценами в интернет-магазине Outlet ? (068) 000 00 00 ? (093) 000 00 00 ? Бесплатная доставка по Украине";
                        $product->meta_description_uk = "Купити $product->name_uk за найкращими цiнами в iнтернет-магазині Outlet ? (068) 000 00 00 ? (093) 000 00 00 ? Безкоштовна доставка по Україні";
                        $product->meta_keywords_ru = "$product->name_ru купить в интернет-магазине Outlet";
                        $product->meta_keywords_uk = "$product->name_uk купить в интернет-магазине Outlet";
                        $product->meta_h1_ru = $product->name_ru;
                        $product->meta_h1_uk = $product->name_uk;
                        $product->save();
                    }
                }

                if ($i = 6)
                {
                    for ($j = 1; $j <= 30; $j++)
                    {
                        $product = new Product();
                        $product->category_id = $i;
                        $product->name_ru = "Босоножки $j";
                        $product->name_uk = "Босоніжки $j";
                        $product->slug = str_slug("Босоножки $j");
                        $product->price = rand(100.00, 5000.00);
                        $product->description_ru = "lorem ipsum ru $j";
                        $product->description_uk = "lorem ipsum uk $j";
                        $product->vendor_code = str_random(10);
                        $product->rating = rand(0, 5);
                        $product->save();
                        $product->meta_title_ru = "$product->name_ru купить в интернет-магазине Outlet";
                        $product->meta_title_uk = "$product->name_uk купить в интернет-магазине Outlet";
                        $product->meta_description_ru = "Купить $product->name_ru за лучшими ценами в интернет-магазине Outlet ? (068) 000 00 00 ? (093) 000 00 00 ? Бесплатная доставка по Украине";
                        $product->meta_description_uk = "Купити $product->name_uk за найкращими цiнами в iнтернет-магазині Outlet ? (068) 000 00 00 ? (093) 000 00 00 ? Безкоштовна доставка по Україні";
                        $product->meta_keywords_ru = "$product->name_ru купить в интернет-магазине Outlet";
                        $product->meta_keywords_uk = "$product->name_uk купить в интернет-магазине Outlet";
                        $product->meta_h1_ru = $product->name_ru;
                        $product->meta_h1_uk = $product->name_uk;
                        $product->save();
                    }
                }

                if ($i = 7)
                {
                    for ($j = 1; $j <= 30; $j++)
                    {
                        $product = new Product();
                        $product->category_id = $i;
                        $product->name_ru = "Ботильоны $j";
                        $product->name_uk = "Ботильйони $j";
                        $product->slug = str_slug("Ботильоны $j");
                        $product->price = rand(100.00, 5000.00);
                        $product->description_ru = "lorem ipsum ru $j";
                        $product->description_uk = "lorem ipsum uk $j";
                        $product->vendor_code = str_random(10);
                        $product->rating = rand(0, 5);
                        $product->save();
                        $product->meta_title_ru = "$product->name_ru купить в интернет-магазине Outlet";
                        $product->meta_title_uk = "$product->name_uk купить в интернет-магазине Outlet";
                        $product->meta_description_ru = "Купить $product->name_ru за лучшими ценами в интернет-магазине Outlet ? (068) 000 00 00 ? (093) 000 00 00 ? Бесплатная доставка по Украине";
                        $product->meta_description_uk = "Купити $product->name_uk за найкращими цiнами в iнтернет-магазині Outlet ? (068) 000 00 00 ? (093) 000 00 00 ? Безкоштовна доставка по Україні";
                        $product->meta_keywords_ru = "$product->name_ru купить в интернет-магазине Outlet";
                        $product->meta_keywords_uk = "$product->name_uk купить в интернет-магазине Outlet";
                        $product->meta_h1_ru = $product->name_ru;
                        $product->meta_h1_uk = $product->name_uk;
                        $product->save();
                    }
                }

                if ($i = 8)
                {
                    for ($j = 1; $j <= 30; $j++)
                    {
                        $product = new Product();
                        $product->category_id = $i;
                        $product->name_ru = "Ботинки $j";
                        $product->name_uk = "Черевики $j";
                        $product->slug = str_slug("Ботинки $j");
                        $product->price = rand(100.00, 5000.00);
                        $product->description_ru = "lorem ipsum ru $j";
                        $product->description_uk = "lorem ipsum uk $j";
                        $product->vendor_code = str_random(10);
                        $product->rating = rand(0, 5);
                        $product->save();
                        $product->meta_title_ru = "$product->name_ru купить в интернет-магазине Outlet";
                        $product->meta_title_uk = "$product->name_uk купить в интернет-магазине Outlet";
                        $product->meta_description_ru = "Купить $product->name_ru за лучшими ценами в интернет-магазине Outlet ? (068) 000 00 00 ? (093) 000 00 00 ? Бесплатная доставка по Украине";
                        $product->meta_description_uk = "Купити $product->name_uk за найкращими цiнами в iнтернет-магазині Outlet ? (068) 000 00 00 ? (093) 000 00 00 ? Безкоштовна доставка по Україні";
                        $product->meta_keywords_ru = "$product->name_ru купить в интернет-магазине Outlet";
                        $product->meta_keywords_uk = "$product->name_uk купить в интернет-магазине Outlet";
                        $product->meta_h1_ru = $product->name_ru;
                        $product->meta_h1_uk = $product->name_uk;
                        $product->save();
                    }
                }

                if ($i = 9)
                {
                    for ($j = 1; $j <= 30; $j++)
                    {
                        $product = new Product();
                        $product->category_id = $i;
                        $product->name_ru = "Ботинки мужские $j";
                        $product->name_uk = "Черевики чоловічі $j";
                        $product->slug = str_slug("Ботинки мужские $j");
                        $product->price = rand(100.00, 5000.00);
                        $product->description_ru = "lorem ipsum ru $j";
                        $product->description_uk = "lorem ipsum uk $j";
                        $product->vendor_code = str_random(10);
                        $product->rating = rand(0, 5);
                        $product->save();
                        $product->meta_title_ru = "$product->name_ru купить в интернет-магазине Outlet";
                        $product->meta_title_uk = "$product->name_uk купить в интернет-магазине Outlet";
                        $product->meta_description_ru = "Купить $product->name_ru за лучшими ценами в интернет-магазине Outlet ? (068) 000 00 00 ? (093) 000 00 00 ? Бесплатная доставка по Украине";
                        $product->meta_description_uk = "Купити $product->name_uk за найкращими цiнами в iнтернет-магазині Outlet ? (068) 000 00 00 ? (093) 000 00 00 ? Безкоштовна доставка по Україні";
                        $product->meta_keywords_ru = "$product->name_ru купить в интернет-магазине Outlet";
                        $product->meta_keywords_uk = "$product->name_uk купить в интернет-магазине Outlet";
                        $product->meta_h1_ru = $product->name_ru;
                        $product->meta_h1_uk = $product->name_uk;
                        $product->save();
                    }
                }

                if ($i = 10)
                {
                    for ($j = 1; $j <= 30; $j++)
                    {
                        $product = new Product();
                        $product->category_id = $i;
                        $product->name_ru = "Кеды $j";
                        $product->name_uk = "Кеди $j";
                        $product->slug = str_slug("Кеды $j");
                        $product->price = rand(100.00, 5000.00);
                        $product->description_ru = "lorem ipsum ru $j";
                        $product->description_uk = "lorem ipsum uk $j";
                        $product->vendor_code = str_random(10);
                        $product->rating = rand(0, 5);
                        $product->save();
                        $product->meta_title_ru = "$product->name_ru купить в интернет-магазине Outlet";
                        $product->meta_title_uk = "$product->name_uk купить в интернет-магазине Outlet";
                        $product->meta_description_ru = "Купить $product->name_ru за лучшими ценами в интернет-магазине Outlet ? (068) 000 00 00 ? (093) 000 00 00 ? Бесплатная доставка по Украине";
                        $product->meta_description_uk = "Купити $product->name_uk за найкращими цiнами в iнтернет-магазині Outlet ? (068) 000 00 00 ? (093) 000 00 00 ? Безкоштовна доставка по Україні";
                        $product->meta_keywords_ru = "$product->name_ru купить в интернет-магазине Outlet";
                        $product->meta_keywords_uk = "$product->name_uk купить в интернет-магазине Outlet";
                        $product->meta_h1_ru = $product->name_ru;
                        $product->meta_h1_uk = $product->name_uk;
                        $product->save();
                    }
                }

                if ($i = 11)
                {
                    for ($j = 1; $j <= 30; $j++)
                    {
                        $product = new Product();
                        $product->category_id = $i;
                        $product->name_ru = "Кроссовки $j";
                        $product->name_uk = "Кросівки $j";
                        $product->slug = str_slug("Кроссовки $j");
                        $product->price = rand(100.00, 5000.00);
                        $product->description_ru = "lorem ipsum ru $j";
                        $product->description_uk = "lorem ipsum uk $j";
                        $product->vendor_code = str_random(10);
                        $product->rating = rand(0, 5);
                        $product->save();
                        $product->meta_title_ru = "$product->name_ru купить в интернет-магазине Outlet";
                        $product->meta_title_uk = "$product->name_uk купить в интернет-магазине Outlet";
                        $product->meta_description_ru = "Купить $product->name_ru за лучшими ценами в интернет-магазине Outlet ? (068) 000 00 00 ? (093) 000 00 00 ? Бесплатная доставка по Украине";
                        $product->meta_description_uk = "Купити $product->name_uk за найкращими цiнами в iнтернет-магазині Outlet ? (068) 000 00 00 ? (093) 000 00 00 ? Безкоштовна доставка по Україні";
                        $product->meta_keywords_ru = "$product->name_ru купить в интернет-магазине Outlet";
                        $product->meta_keywords_uk = "$product->name_uk купить в интернет-магазине Outlet";
                        $product->meta_h1_ru = $product->name_ru;
                        $product->meta_h1_uk = $product->name_uk;
                        $product->save();
                    }
                }

                if ($i = 12)
                {
                    for ($j = 1; $j <= 30; $j++)
                    {
                        $product = new Product();
                        $product->category_id = $i;
                        $product->name_ru = "Туфли $j";
                        $product->name_uk = "Туфлі $j";
                        $product->slug = str_slug("Туфли $j");
                        $product->price = rand(100.00, 5000.00);
                        $product->description_ru = "lorem ipsum ru $j";
                        $product->description_uk = "lorem ipsum uk $j";
                        $product->vendor_code = str_random(10);
                        $product->rating = rand(0, 5);
                        $product->save();
                        $product->meta_title_ru = "$product->name_ru купить в интернет-магазине Outlet";
                        $product->meta_title_uk = "$product->name_uk купить в интернет-магазине Outlet";
                        $product->meta_description_ru = "Купить $product->name_ru за лучшими ценами в интернет-магазине Outlet ? (068) 000 00 00 ? (093) 000 00 00 ? Бесплатная доставка по Украине";
                        $product->meta_description_uk = "Купити $product->name_uk за найкращими цiнами в iнтернет-магазині Outlet ? (068) 000 00 00 ? (093) 000 00 00 ? Безкоштовна доставка по Україні";
                        $product->meta_keywords_ru = "$product->name_ru купить в интернет-магазине Outlet";
                        $product->meta_keywords_uk = "$product->name_uk купить в интернет-магазине Outlet";
                        $product->meta_h1_ru = $product->name_ru;
                        $product->meta_h1_uk = $product->name_uk;
                        $product->save();
                    }
                }
            }

            DB::statement('SET FOREIGN_KEY_CHECKS=1');
            DB::commit();
    }
}
