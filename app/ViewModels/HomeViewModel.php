<?php
/**
 * Created by PhpStorm.
 * User: vlad_
 * Date: 30.03.2018
 * Time: 14:30
 */

namespace App\ViewModels;

/**
 * contains data for home page
 * Class HomeViewModel
 * @package App\ViewModels
 */
class HomeViewModel extends LayoutViewModel
{
    /**
     * contains slides for main slider
     * @var $main_slider
     */
    public $main_slider;

    /**
     * contains products for new slider
     * @var $new_slider_products
     */
    public $new_slider_products;

    /**
     * contains products for sales slider
     * @var $sales_slider_products
     */
    public $sales_slider_products;

    /**
     * contains products for top slider
     * @var $top_slider_products
     */
    public $top_slider_products;

    /**
     * contains banners
     * @var $banners
     */
    public $banners;

    /**
     * products limit for sales slider
     * @var int $sales_limit
     */
    public $sales_limit = 8;

    /**
     * limit for banners
     * @var int $banners_limit
     */
    public $banners_limit = 6;

    /**
     * products limit for top slider
     * @var int $top_limit
     */
    public $top_limit = 8;

    /**
     * products limit for new slider
     * @var int $new_limit
     */
    public $new_limit = 8;

    /**
     * contains 'new' promotion
     * @var $new_promotion
     */
    public $new_promotion;

    /**
     * contains 'sales' promotion
     * @var $sales_promotion
     */
    public $sales_promotion;

    /**
     * contains 'top' promotion
     * @var $top_promotion
     */
    public $top_promotion;

    /**
     * HomeViewModel constructor.
     * @param $view
     * @param $language
     */
    public function __construct($view, $language)
    {
        parent::__construct($view, $language);
    }
}