<?php

namespace App\ViewModels;


/**
 * contains data for product page
 * Class ProductViewModel
 * @package App\ViewModels
 */
class ProductViewModel extends LayoutViewModel
{
    /**
     * contains product slug
     * @var $slug
     */
    public $slug;
    /**
     * contains Product
     * @var $product
     */
    public $product;

    /**
     * contains product category
     * @var $product_category
     */
    public $product_category;

    /**
     * contains products from current products category
     * @var $similar_products
     */
    public $similar_products;

    /**
     * ProductViewModel constructor.
     * @param $view
     * @param $language
     */
    public function __construct($view, $slug, $language)
    {
        parent::__construct($view, $language);

        $this->slug = $slug;
    }
}
