<?php

use App\DatabaseModels\Category;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Category::truncate();
        DB::beginTransaction();

            //id 1
            $category = new Category();
            $category->name_ru = 'Женская обувь';
            $category->name_uk = 'Жіноче взуття';
            $category->slug = str_slug('Женская обувь');
            $category->save();
            $category->meta_title_ru = "$category->name_ru купить в интернет-магазине Outlet";
            $category->meta_title_uk = "$category->name_uk купить в интернет-магазине Outlet";
            $category->meta_description_ru = "Купить $category->name_ru за лучшими ценами в интернет-магазине Outlet ? (068) 000 00 00 ? (093) 000 00 00 ? Бесплатная доставка по Украине";
            $category->meta_description_uk = "Купити $category->name_uk за найкращими цiнами в iнтернет-магазині Outlet ? (068) 000 00 00 ? (093) 000 00 00 ? Безкоштовна доставка по Україні";
            $category->meta_keywords_ru = "$category->name_ru купить в интернет-магазине Outlet";
            $category->meta_keywords_uk = "$category->name_uk купить в интернет-магазине Outlet";
            $category->meta_h1_ru = $category->name_ru;
            $category->meta_h1_uk = $category->name_uk;
            $category->save();

            //id 2
            $category = new Category();
            $category->name_ru = 'Мужская обувь';
            $category->name_uk = 'Чоловіче взуття';
            $category->slug = str_slug('Мужская обувь');
            $category->save();
            $category->meta_title_ru = "$category->name_ru купить в интернет-магазине Outlet";
            $category->meta_title_uk = "$category->name_uk купить в интернет-магазине Outlet";
            $category->meta_description_ru = "Купить $category->name_ru за лучшими ценами в интернет-магазине Outlet ? (068) 000 00 00 ? (093) 000 00 00 ? Бесплатная доставка по Украине";
            $category->meta_description_uk = "Купити $category->name_uk за найкращими цiнами в iнтернет-магазині Outlet ? (068) 000 00 00 ? (093) 000 00 00 ? Безкоштовна доставка по Україні";
            $category->meta_keywords_ru = "$category->name_ru купить в интернет-магазине Outlet";
            $category->meta_keywords_uk = "$category->name_uk купить в интернет-магазине Outlet";
            $category->meta_h1_ru = $category->name_ru;
            $category->meta_h1_uk = $category->name_uk;
            $category->save();

            //id 3
            $category = new Category();
            $category->name_ru = 'Обувь для девочек';
            $category->name_uk = 'Взуття для дівчаток';
            $category->slug = str_slug('Обувь для девочек');
            $category->save();
            $category->meta_title_ru = "$category->name_ru купить в интернет-магазине Outlet";
            $category->meta_title_uk = "$category->name_uk купить в интернет-магазине Outlet";
            $category->meta_description_ru = "Купить $category->name_ru за лучшими ценами в интернет-магазине Outlet ? (068) 000 00 00 ? (093) 000 00 00 ? Бесплатная доставка по Украине";
            $category->meta_description_uk = "Купити $category->name_uk за найкращими цiнами в iнтернет-магазині Outlet ? (068) 000 00 00 ? (093) 000 00 00 ? Безкоштовна доставка по Україні";
            $category->meta_keywords_ru = "$category->name_ru купить в интернет-магазине Outlet";
            $category->meta_keywords_uk = "$category->name_uk купить в интернет-магазине Outlet";
            $category->meta_h1_ru = $category->name_ru;
            $category->meta_h1_uk = $category->name_uk;
            $category->save();

            //id 4
            $category = new Category();
            $category->name_ru = 'Обувь для мальчиков';
            $category->name_uk = 'Взуття для хлопчиків';
            $category->slug = str_slug('Обувь для мальчиков');
            $category->save();
            $category->meta_title_ru = "$category->name_ru купить в интернет-магазине Outlet";
            $category->meta_title_uk = "$category->name_uk купить в интернет-магазине Outlet";
            $category->meta_description_ru = "Купить $category->name_ru за лучшими ценами в интернет-магазине Outlet ? (068) 000 00 00 ? (093) 000 00 00 ? Бесплатная доставка по Украине";
            $category->meta_description_uk = "Купити $category->name_uk за найкращими цiнами в iнтернет-магазині Outlet ? (068) 000 00 00 ? (093) 000 00 00 ? Безкоштовна доставка по Україні";
            $category->meta_keywords_ru = "$category->name_ru купить в интернет-магазине Outlet";
            $category->meta_keywords_uk = "$category->name_uk купить в интернет-магазине Outlet";
            $category->meta_h1_ru = $category->name_ru;
            $category->meta_h1_uk = $category->name_uk;
            $category->save();

            //id 5
            $category = new Category();
            $category->parent_id = 1;
            $category->name_ru = 'Балетки';
            $category->name_uk = 'Балетки';
            $category->slug = str_slug('Балетки');
            $category->save();
            $category->meta_title_ru = "$category->name_ru купить в интернет-магазине Outlet";
            $category->meta_title_uk = "$category->name_uk купить в интернет-магазине Outlet";
            $category->meta_description_ru = "Купить $category->name_ru за лучшими ценами в интернет-магазине Outlet ? (068) 000 00 00 ? (093) 000 00 00 ? Бесплатная доставка по Украине";
            $category->meta_description_uk = "Купити $category->name_uk за найкращими цiнами в iнтернет-магазині Outlet ? (068) 000 00 00 ? (093) 000 00 00 ? Безкоштовна доставка по Україні";
            $category->meta_keywords_ru = "$category->name_ru купить в интернет-магазине Outlet";
            $category->meta_keywords_uk = "$category->name_uk купить в интернет-магазине Outlet";
            $category->meta_h1_ru = $category->name_ru;
            $category->meta_h1_uk = $category->name_uk;
            $category->save();

            //id 6
            $category = new Category();
            $category->parent_id = 1;
            $category->name_ru = 'Босоножки';
            $category->name_uk = 'Босоніжки';
            $category->slug = str_slug('Босоножки');
            $category->save();
            $category->meta_title_ru = "$category->name_ru купить в интернет-магазине Outlet";
            $category->meta_title_uk = "$category->name_uk купить в интернет-магазине Outlet";
            $category->meta_description_ru = "Купить $category->name_ru за лучшими ценами в интернет-магазине Outlet ? (068) 000 00 00 ? (093) 000 00 00 ? Бесплатная доставка по Украине";
            $category->meta_description_uk = "Купити $category->name_uk за найкращими цiнами в iнтернет-магазині Outlet ? (068) 000 00 00 ? (093) 000 00 00 ? Безкоштовна доставка по Україні";
            $category->meta_keywords_ru = "$category->name_ru купить в интернет-магазине Outlet";
            $category->meta_keywords_uk = "$category->name_uk купить в интернет-магазине Outlet";
            $category->meta_h1_ru = $category->name_ru;
            $category->meta_h1_uk = $category->name_uk;
            $category->save();

            //id 7
            $category = new Category();
            $category->parent_id = 1;
            $category->name_ru = 'Ботильоны';
            $category->name_uk = 'Ботильйони';
            $category->slug = str_slug('Ботильоны');
            $category->save();
            $category->meta_title_ru = "$category->name_ru купить в интернет-магазине Outlet";
            $category->meta_title_uk = "$category->name_uk купить в интернет-магазине Outlet";
            $category->meta_description_ru = "Купить $category->name_ru за лучшими ценами в интернет-магазине Outlet ? (068) 000 00 00 ? (093) 000 00 00 ? Бесплатная доставка по Украине";
            $category->meta_description_uk = "Купити $category->name_uk за найкращими цiнами в iнтернет-магазині Outlet ? (068) 000 00 00 ? (093) 000 00 00 ? Безкоштовна доставка по Україні";
            $category->meta_keywords_ru = "$category->name_ru купить в интернет-магазине Outlet";
            $category->meta_keywords_uk = "$category->name_uk купить в интернет-магазине Outlet";
            $category->meta_h1_ru = $category->name_ru;
            $category->meta_h1_uk = $category->name_uk;
            $category->save();

            //id 8
            $category = new Category();
            $category->parent_id = 1;
            $category->name_ru = 'Ботинки';
            $category->name_uk = 'Черевики';
            $category->slug = str_slug('Ботинки женские');
            $category->save();
            $category->meta_title_ru = "$category->name_ru купить в интернет-магазине Outlet";
            $category->meta_title_uk = "$category->name_uk купить в интернет-магазине Outlet";
            $category->meta_description_ru = "Купить $category->name_ru за лучшими ценами в интернет-магазине Outlet ? (068) 000 00 00 ? (093) 000 00 00 ? Бесплатная доставка по Украине";
            $category->meta_description_uk = "Купити $category->name_uk за найкращими цiнами в iнтернет-магазині Outlet ? (068) 000 00 00 ? (093) 000 00 00 ? Безкоштовна доставка по Україні";
            $category->meta_keywords_ru = "$category->name_ru купить в интернет-магазине Outlet";
            $category->meta_keywords_uk = "$category->name_uk купить в интернет-магазине Outlet";
            $category->meta_h1_ru = $category->name_ru;
            $category->meta_h1_uk = $category->name_uk;
            $category->save();

            //id 9
            $category = new Category();
            $category->parent_id = 2;
            $category->name_ru = 'Ботинки';
            $category->name_uk = 'Черевики';
            $category->slug = str_slug('Ботинки мужские');
            $category->save();
            $category->meta_title_ru = "$category->name_ru купить в интернет-магазине Outlet";
            $category->meta_title_uk = "$category->name_uk купить в интернет-магазине Outlet";
            $category->meta_description_ru = "Купить $category->name_ru за лучшими ценами в интернет-магазине Outlet ? (068) 000 00 00 ? (093) 000 00 00 ? Бесплатная доставка по Украине";
            $category->meta_description_uk = "Купити $category->name_uk за найкращими цiнами в iнтернет-магазині Outlet ? (068) 000 00 00 ? (093) 000 00 00 ? Безкоштовна доставка по Україні";
            $category->meta_keywords_ru = "$category->name_ru купить в интернет-магазине Outlet";
            $category->meta_keywords_uk = "$category->name_uk купить в интернет-магазине Outlet";
            $category->meta_h1_ru = $category->name_ru;
            $category->meta_h1_uk = $category->name_uk;
            $category->save();

            //id 10
            $category = new Category();
            $category->parent_id = 2;
            $category->name_ru = 'Кеды';
            $category->name_uk = 'Кеди';
            $category->slug = str_slug('Кеды');
            $category->save();
            $category->meta_title_ru = "$category->name_ru купить в интернет-магазине Outlet";
            $category->meta_title_uk = "$category->name_uk купить в интернет-магазине Outlet";
            $category->meta_description_ru = "Купить $category->name_ru за лучшими ценами в интернет-магазине Outlet ? (068) 000 00 00 ? (093) 000 00 00 ? Бесплатная доставка по Украине";
            $category->meta_description_uk = "Купити $category->name_uk за найкращими цiнами в iнтернет-магазині Outlet ? (068) 000 00 00 ? (093) 000 00 00 ? Безкоштовна доставка по Україні";
            $category->meta_keywords_ru = "$category->name_ru купить в интернет-магазине Outlet";
            $category->meta_keywords_uk = "$category->name_uk купить в интернет-магазине Outlet";
            $category->meta_h1_ru = $category->name_ru;
            $category->meta_h1_uk = $category->name_uk;
            $category->save();

            //id 11
            $category = new Category();
            $category->parent_id = 2;
            $category->name_ru = 'Кроссовки';
            $category->name_uk = 'Кросівки';
            $category->slug = str_slug('Кроссовки');
            $category->save();
            $category->meta_title_ru = "$category->name_ru купить в интернет-магазине Outlet";
            $category->meta_title_uk = "$category->name_uk купить в интернет-магазине Outlet";
            $category->meta_description_ru = "Купить $category->name_ru за лучшими ценами в интернет-магазине Outlet ? (068) 000 00 00 ? (093) 000 00 00 ? Бесплатная доставка по Украине";
            $category->meta_description_uk = "Купити $category->name_uk за найкращими цiнами в iнтернет-магазині Outlet ? (068) 000 00 00 ? (093) 000 00 00 ? Безкоштовна доставка по Україні";
            $category->meta_keywords_ru = "$category->name_ru купить в интернет-магазине Outlet";
            $category->meta_keywords_uk = "$category->name_uk купить в интернет-магазине Outlet";
            $category->meta_h1_ru = $category->name_ru;
            $category->meta_h1_uk = $category->name_uk;
            $category->save();

            //id 12
            $category = new Category();
            $category->parent_id = 2;
            $category->name_ru = 'Туфли';
            $category->name_uk = 'Туфлі';
            $category->slug = str_slug('Туфли');
            $category->save();
            $category->meta_title_ru = "$category->name_ru купить в интернет-магазине Outlet";
            $category->meta_title_uk = "$category->name_uk купить в интернет-магазине Outlet";
            $category->meta_description_ru = "Купить $category->name_ru за лучшими ценами в интернет-магазине Outlet ? (068) 000 00 00 ? (093) 000 00 00 ? Бесплатная доставка по Украине";
            $category->meta_description_uk = "Купити $category->name_uk за найкращими цiнами в iнтернет-магазині Outlet ? (068) 000 00 00 ? (093) 000 00 00 ? Безкоштовна доставка по Україні";
            $category->meta_keywords_ru = "$category->name_ru купить в интернет-магазине Outlet";
            $category->meta_keywords_uk = "$category->name_uk купить в интернет-магазине Outlet";
            $category->meta_h1_ru = $category->name_ru;
            $category->meta_h1_uk = $category->name_uk;
            $category->save();

        DB::commit();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

    }
}
