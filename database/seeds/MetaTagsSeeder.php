<?php

use App\DatabaseModels\MetaTag;
use Illuminate\Database\Seeder;

class MetaTagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        MetaTag::truncate();
        DB::beginTransaction();

        $meta_tag = new MetaTag();
        $meta_tag->page_name = 'home';
        $meta_tag->meta_title_ru = 'Outlet Shoes - официальный сайт бренд обуви.';
        $meta_tag->meta_title_uk = 'Outlet Shoes - офіційний сайт бренд взуття.';
        $meta_tag->meta_description_ru = 'Outlet Shoes - бренд обуви.
         Качественная, удобная, стильная обувь по самым доступным ценам от производителя!';
        $meta_tag->meta_description_uk = 'Outlet Shoes - бренд обуви.
         Качественная, удобная, стильная обувь по самым доступным ценам от производителя!';
        $meta_tag->meta_keywords_ru = 'lorem ipsum ru';
        $meta_tag->meta_keywords_uk = 'lorem ipsum uk';
        $meta_tag->meta_h1_ru = 'lorem ipsum ru';
        $meta_tag->meta_h1_uk = 'lorem ipsum uk';
        $meta_tag->save();

        $meta_tag = new MetaTag();
        $meta_tag->page_name = 'search';
        $meta_tag->meta_title_ru = 'Результат поиска';
        $meta_tag->meta_title_uk = 'Результат пошуку';
        $meta_tag->meta_description_ru = 'lorem ipsum ru';
        $meta_tag->meta_description_uk = 'lorem ipsum uk';
        $meta_tag->meta_keywords_ru = 'lorem ipsum ru';
        $meta_tag->meta_keywords_uk = 'lorem ipsum uk';
        $meta_tag->meta_h1_ru = 'lorem ipsum ru';
        $meta_tag->meta_h1_uk = 'lorem ipsum uk';
        $meta_tag->save();

        $meta_tag = new MetaTag();
        $meta_tag->page_name = 'order';
        $meta_tag->meta_title_ru = 'Оформление заказа | Outlet Shoes | Интернет-магазин';
        $meta_tag->meta_title_uk = 'Оформлення замовлення | Outlet Shoes | Інтернет-магазин';
        $meta_tag->meta_description_ru = 'lorem ipsum ru';
        $meta_tag->meta_description_uk = 'lorem ipsum uk';
        $meta_tag->meta_keywords_ru = 'lorem ipsum ru';
        $meta_tag->meta_keywords_uk = 'lorem ipsum uk';
        $meta_tag->meta_h1_ru = 'lorem ipsum ru';
        $meta_tag->meta_h1_uk = 'lorem ipsum uk';
        $meta_tag->save();

        $meta_tag = new MetaTag();
        $meta_tag->page_name = 'profile-personal-info';
        $meta_tag->meta_title_ru = 'Личные данные | Outlet Shoes | Интернет-магазин';
        $meta_tag->meta_title_uk = 'Особисті дані | Outlet Shoes | Інтернет-магазин';
        $meta_tag->meta_description_ru = 'lorem ipsum ru';
        $meta_tag->meta_description_uk = 'lorem ipsum uk';
        $meta_tag->meta_keywords_ru = 'lorem ipsum ru';
        $meta_tag->meta_keywords_uk = 'lorem ipsum uk';
        $meta_tag->meta_h1_ru = 'lorem ipsum ru';
        $meta_tag->meta_h1_uk = 'lorem ipsum uk';
        $meta_tag->save();

        $meta_tag = new MetaTag();
        $meta_tag->page_name = 'profile-payment-delivery';
        $meta_tag->meta_title_ru = 'Доставка и оплата | Outlet Shoes | Интернет-магазин';
        $meta_tag->meta_title_uk = 'Доставка та оплата | Outlet Shoes | Інтернет-магазин';
        $meta_tag->meta_description_ru = 'lorem ipsum ru';
        $meta_tag->meta_description_uk = 'lorem ipsum uk';
        $meta_tag->meta_keywords_ru = 'lorem ipsum ru';
        $meta_tag->meta_keywords_uk = 'lorem ipsum uk';
        $meta_tag->meta_h1_ru = 'lorem ipsum ru';
        $meta_tag->meta_h1_uk = 'lorem ipsum uk';
        $meta_tag->save();

        $meta_tag = new MetaTag();
        $meta_tag->page_name = 'profile-wish-list';
        $meta_tag->meta_title_ru = 'Список желаний | Outlet Shoes | Интернет-магазин';
        $meta_tag->meta_title_uk = 'Список бажань | Outlet Shoes | Інтернет-магазин';
        $meta_tag->meta_description_ru = 'lorem ipsum ru';
        $meta_tag->meta_description_uk = 'lorem ipsum uk';
        $meta_tag->meta_keywords_ru = 'lorem ipsum ru';
        $meta_tag->meta_keywords_uk = 'lorem ipsum uk';
        $meta_tag->meta_h1_ru = 'lorem ipsum ru';
        $meta_tag->meta_h1_uk = 'lorem ipsum uk';
        $meta_tag->save();

        $meta_tag = new MetaTag();
        $meta_tag->page_name = 'profile-my-orders';
        $meta_tag->meta_title_ru = 'Мои заказы | Outlet Shoes | Интернет-магазин';
        $meta_tag->meta_title_uk = 'Мої замовлення | Outlet Shoes | Інтернет-магазин';
        $meta_tag->meta_description_ru = 'lorem ipsum ru';
        $meta_tag->meta_description_uk = 'lorem ipsum uk';
        $meta_tag->meta_keywords_ru = 'lorem ipsum ru';
        $meta_tag->meta_keywords_uk = 'lorem ipsum uk';
        $meta_tag->meta_h1_ru = 'lorem ipsum ru';
        $meta_tag->meta_h1_uk = 'lorem ipsum uk';
        $meta_tag->save();

        $meta_tag = new MetaTag();
        $meta_tag->page_name = 'about';
        $meta_tag->meta_title_ru = 'О нас | Outlet Shoes | Интернет-магазин';
        $meta_tag->meta_title_uk = 'Про нас | Outlet Shoes | Інтернет-магазин';
        $meta_tag->meta_description_ru = 'lorem ipsum ru';
        $meta_tag->meta_description_uk = 'lorem ipsum uk';
        $meta_tag->meta_keywords_ru = 'lorem ipsum ru';
        $meta_tag->meta_keywords_uk = 'lorem ipsum uk';
        $meta_tag->meta_h1_ru = 'lorem ipsum ru';
        $meta_tag->meta_h1_uk = 'lorem ipsum uk';
        $meta_tag->save();

        $meta_tag = new MetaTag();
        $meta_tag->page_name = 'contact';
        $meta_tag->meta_title_ru = 'Контакты | Outlet Shoes | Интернет-магазин';
        $meta_tag->meta_title_uk = 'Контакти | Outlet Shoes | Інтернет-магазин';
        $meta_tag->meta_description_ru = 'lorem ipsum ru';
        $meta_tag->meta_description_uk = 'lorem ipsum uk';
        $meta_tag->meta_keywords_ru = 'lorem ipsum ru';
        $meta_tag->meta_keywords_uk = 'lorem ipsum uk';
        $meta_tag->meta_h1_ru = 'lorem ipsum ru';
        $meta_tag->meta_h1_uk = 'lorem ipsum uk';
        $meta_tag->save();

        DB::commit();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
