<?php
/**
 * Created by PhpStorm.
 * User: vlad_
 * Date: 30.03.2018
 * Time: 14:30
 */

namespace App\ViewModels;


class HomeViewModel extends LayoutViewModel
{
    public $main_slider;
    public $new_slider_products;
    public $sales_slider_products;
    public $top_slider_products;
    public $banners;
    public $sales_limit = 8;
    public $banners_limit = 6;
    public $top_limit = 8;
    public $new_limit = 8;

    public function __construct($view, $language)
    {
        parent::__construct($view, $language);
    }
}